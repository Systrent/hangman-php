<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/connection.php';
    require_once 'send_email.php';

    if(isset($_POST['submit'])){
        //Extract values from the $_POST array
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];

        if(empty($_FILES['avatar']['name'])){
            $default = 'blank.png';
            $target_dir = 'uploads/';
            $destination = $target_dir . $default;
            move_uploaded_file($default, $destination);
        }
        else{
            $original_file = $_FILES['avatar']['tmp_name'];
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $destination = $target_dir . $phone . '.' . $extension;
            move_uploaded_file($original_file, $destination);
        }

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($firstName, $lastName,  $dateOfBirth, $email, $phone, $specialty, $destination);
        
        //Call function to insert the specialty name
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess){
            //Calling a function without creating an instance, thanks to the static class SendEmail.
            $subject = 'Welcome to IT Conference ' . date('Y');
            $content = $firstName . ', you have succesfully registered for this year\'s IT Conference';
            SendEmail::sendMail($email, $subject, $content);
            include 'includes/success_message.php';
            
            $results = $crud->getAttendees();
        }
        else{
            include 'includes/error_message.php';
        }
    }
?>
    <div class="card mx-auto m-5 border border-1 border-primary shadow" style="width: 22rem; border-radius: 0.7rem;">
        <img src="<?php echo $destination; ?>" class="card-img-top p-1" alt="Avatar Image" style="border-radius: 0.7rem; object-fit: cover; width: 100%; height: 30vh;">
        <div class="card-body">
            <h5 class="card-title px-2">
                <?php echo $_POST['firstName'] . ' ' . $_POST['lastName']; ?>
            </h5>
            <h6 class="card-subtitle mb-3 px-2 text-muted">
                <?php echo $specialtyName['name']; ?>
            </h6>
            <p class="card-text px-2">
                Date Of Birth: <?php echo $_POST['dateOfBirth']; ?>
            </p>
            <p class="card-text px-2">
                Email Address: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text px-2">
                Contact Number: <?php echo $_POST['phone']; ?>
            </p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
       <a href="viewrecords.php" class="btn btn-dark" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem; min-width: 22rem;">Back to List</a>
    </div>
<?php
    require_once 'includes/footer.php';
?>