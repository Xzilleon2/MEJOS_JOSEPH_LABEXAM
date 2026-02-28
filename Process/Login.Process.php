<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login_btn'])) {

    // imports
    include_once "./DataStorage.Class.php";

    // get data from form
    $email = $_POST['Login_Email'];
    $password = $_POST['Login_Password'];

    // Initialize Data Storage
    $dataStorage = new DataStorage();

    // Validate User
    if(!$dataStorage->login($email, $password)) {
        header("Location: ../Login.php?error=loginfailed");
        exit();
    } else {
        $_SESSION['MESSAGE'] = "Login Successful!";
        header("Location: ../index.php");
        exit();
    }

} else {
    header("Location: ../Login.php?error=invalidaccess");
    exit();
}

?>