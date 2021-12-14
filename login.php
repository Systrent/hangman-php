<?php
    $title = 'LOGIN';
    require_once 'includes/header.php';
    require_once 'db/connection.php';

    //If data was submitted vian a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username, $new_password);
        if(!$result){
                echo '<div class="alert alert-danger my-4 mx-3 text-center" style="border-radius: 0.7rem;" role="alert">Username or Password is incorrect! Please try again</div>';
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['pk_id'];
            header('Location: viewrecords.php');
        }
    }
?>

        <h1 class="login-title-admin text-center"><?php echo $title; ?></h1>

        <div class="sub-card-admin">
            <div class="card-admin p-5">
                <form action = <?php echo htmlentities($_SERVER['PHP_SELF']); ?> method="post">
                    <table class="table table-responsive table-borderless table-sm">
                        <tr>
                            <td class="user-label-admin align-middle"><label for="username">USERNAME:</label></td>
                            <td><input type="text" name="username" id="username" class="form-control user-input-admin" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"></td>
                        </tr>
                        <tr>
                            <td class="pass-label-admin align-middle"><label for="password">PASSWORD:</label></td>
                            <td><input type="password" name="password" id="password" class="form-control pass-input-admin"></td>
                        </tr>
                    </table>
                    <br/>
                    <input type="submit" value="Login" class="login-button-admin">
                    <a href="#" class="forgot-admin mt-1"> Forgot password? </a>
                </form>
                <hr class="hr-login-admin">
                <div class="register-card-admin">
                    <label class="or-label-admin align-middle">OR</label><br>
                    <a href="register.php" class="register-redirection-admin">Register</a>
                </div>
            </div>
        </div>
<?php
    require_once 'includes/footer.php';
?>