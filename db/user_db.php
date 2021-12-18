<?php
    class user{
        //Private database object
        private $db;

        //Constructor to initialize private variable to the database connection
        function __construct($connection){
            $this->db = $connection;
        }

        public function insertUser($username, $password){
            try{
                $result = $this->getUserByUsername($username);

                if($result['num'] > 0){
                    return false;
                }
                else{
                    $new_password = md5($password.$username);

                    //Define SQL statement to be executed
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    
                    //Prepare the SQL statement for execution
                    $stmt = $this->db->prepare($sql);

                    //Bind all placeholders in the actual values
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                    
                    //Execute statement
                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try{
                //Define SQL statement to be executed
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
                                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                
                //Execute statement
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserByUsername($username){
            try{
                //Define SQL statement to be executed
                $sql = "SELECT COUNT(*) AS num FROM users WHERE username = :username";
                                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':username', $username);
                
                //Execute statement
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>