<?php
    class crud{
        //Private database object
        private $db;

        //Constructor to initialize private variable to the database connection
        function __construct($connection){
            $this->db = $connection;
        }

        public function insertAttendees($firstName, $lastName, $dateOfBirth, $email, $phone, $specialty, $avatar_path){
            try {
                //Define SQL statement to be executed
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id, avatar_path) VALUES (:firstName, :lastName, :dateOfBirth, :email, :phone, :specialty, :avatar_path)";
                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':firstName', $firstName);
                $stmt->bindparam(':lastName', $lastName);
                $stmt->bindparam(':dateOfBirth', $dateOfBirth);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':avatar_path', $avatar_path);

                //Execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                //Define SQL statement to be executed
                $sql = "SELECT * FROM attendee a INNER JOIN specialties s ON a.specialty_id = s.pk_specialty_id";
                
                //Query statement
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try{  
                //Define SQL statement to be executed
                $sql = "SELECT * FROM attendee a INNER JOIN specialties s ON a.specialty_id = s.pk_specialty_id WHERE pk_attendee_id = :id";
                                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':id', $id);
                
                //Execute statement
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $firstName, $lastName, $dateOfBirth, $email, $phone, $specialty){
            try{
                //Define SQL statement to be executed
                $sql = "UPDATE attendee SET firstname = :firstName, lastname = :lastName, dateofbirth = :dateOfBirth, emailaddress = :email, contactnumber = :phone, specialty_id = :specialty WHERE pk_attendee_id = :id";
                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':firstName', $firstName);
                $stmt->bindparam(':lastName', $lastName);
                $stmt->bindparam(':dateOfBirth', $dateOfBirth);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam(':specialty', $specialty);
                
                //Execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try{
                //Define SQL statement to be executed
                $sql = "DELETE FROM attendee WHERE pk_attendee_id = :id";
                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':id', $id);
                
                //Execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties(){
            try{
                //Define SQL statement to be executed
                $sql = "SELECT * FROM specialties";
                
                //Query statement
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialtyById($id){
            try{
                //Define SQL statement to be executed
                $sql = "SELECT * FROM specialties WHERE pk_specialty_id = :id";
                
                //Prepare the SQL statement for execution
                $stmt = $this->db->prepare($sql);

                //Bind all placeholders in the actual values
                $stmt->bindparam(':id', $id);
                
                //Execute statement
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>