<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Register_btn'])) {

    // imports
    include_once "./DataStorage.Class.php";

    // get data from form
    $name = trim($_POST['Register_Full_Name']);
    $email =   filter_var(trim($_POST['Register_Email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['Register_Password']);
    $repassword = trim($_POST['Register_Re_Password']);

    // Validate password match
    if($password !== $repassword) {
        $_SESSION['MESSAGE'] = "PASSWORDS DO NOT MATCH!";
        header("Location: ../Register.php?error=passwordmismatch");
        exit();
    }

    // Initialize Data Storage
    $dataStorage = new DataStorage();

    // Validate User
    if(!$dataStorage->register($name, $email, $password)) {
        header("Location: ../Register.php?error=registrationfailed");
        exit();
    } else {
        $_SESSION['MESSAGE'] = "REGISTRATION SUCCESSFUL!";
        header("Location: ../Login.php");
        exit();
    }
} else {
    header("Location: ../Register.php?error=invalidaccess");
    exit();
}

?>