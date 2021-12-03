<?php
    require_once 'db/connection.php';

    //Get values from POST operation
    if(isset($_POST['submit'])){
        //Extract calues from the $_POST array
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //Call CRUD function
        $result = $crud->editAttendee($id, $firstName, $lastName, $dateOfBirth, $email, $phone, $specialty);

        //Redirect to index.php
        if($result){
            header('Location: viewrecords.php');
        }
        else{
            include 'includes/error_message.php';
        }
    }
    else{
        include 'includes/error_message.php';
    }
?>