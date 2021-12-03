<?php
    require_once 'includes/auth_check.php';
    require_once 'db/connection.php';
    if(!isset($_GET['id'])){
        include 'includes/error_message.php';
        header('Location: viewrecords.php');
    }
    else{
        //Get ID values
        $id = $_GET['id'];

        //Call delete function
        $result = $crud->deleteAttendee($id);

        //Redirect to list
        if($result){
            header('Location: viewrecords.php');
        }
        else{
            include 'includes/error_message.php';
        }
    }
?>