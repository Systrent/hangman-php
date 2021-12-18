<?php
    // --- DEVELOPER CONNECTION ---
    $host = 'localhost';
    $db = 'hangman_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // --- REMOTE DB CONNECTION ---
    // $host = 'remotemysql.com';
    // $db = 'NcIDSJxntz';
    // $user = 'NcIDSJxntz';
    // $pass = 'PKZvvTixPq';
    // $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user_db.php';  
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser('admin', 'password');
?>