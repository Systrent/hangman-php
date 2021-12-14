<?php
    //This includes the session file. This file contains code that starts/resumes a session.
    //By having it in thhe header file, it will be included on every page, allowing session capability to be used on every page across thhe website.
    include_once 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#212529">
    <title>Hangman - <?php echo $title ?></title>
    <link rel="shortcut icon" href="images/hangman_logo.ico">

    <!-- Custom / CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Bootstrap / CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQuery / CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!-- Font Awesome Icons / CSS -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css"></link>
</head>
<body>
    <nav class="navbar-admin navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php"><img class="navbar-logo-admin" src="images/hangman_logo.ico"></a>   
            <a class="navbar-title-admin navbar-brand" href="index.php">HANGMAN</a>
            <button disable class="navbar-toggler-admin navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ms-5" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewrecords.php">View Attendees</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php
                        if(!isset($_SESSION['userid'])){
                    ?>
                        <li class="nav-item">
                            <a href="login.php" class="login-button-top-admin nav-link btn px-5">Login</a>
                        </li>
                    <?php
                        }
                        else{
                    ?>       
                        <li class="nav-item mx-auto">
                            <a class="navbar-text btn px-5  fw-bold" style="color: #e9ecef; font-size: 1.1rem; cursor: default;">Hello <?php echo $_SESSION['username'] ?>!</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link btn btn-dark btn-outline-danger px-5" style="border-radius: 0.7rem; color: #ffffff; color:hover: #000000;">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-0 mb-5">
        