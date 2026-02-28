<?php 
session_start();

class DataStorage {

    public function __construct() {
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }
    }

    public function register($name, $email, $password) {

        // Validate inputs
        if($this->emptyInput($name, $email, $password)) {
            $_SESSION['MESSAGE'] = "FIELDS MUST NOT BE EMPTY!";
            header("Location: ../Register.php?error=emptyinput");
            exit();
        } 

        // Check if email already exists
        if (isset($_SESSION['users'][$email])) {
            $_SESSION['MESSAGE'] = "EMAIL ALREADY IN USE!";
            header("Location: ../Register.php?error=emailtaken");
            exit();
        }

        // Store user data
        $_SESSION['users'][$email] = [
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];


        // Return success or error message
        return true;

    }

    public function login($email, $password) {

        // Check if email exists
        if(!isset($_SESSION['users'][$email])) {
            $_SESSION['MESSAGE'] = "INVALID CREDENTIALS!";
            header("Location: ../Login.php?error=invalidcredentials");
            exit();
        }

        // Verify password
        if (!password_verify($password, $_SESSION['users'][$email]['password'])) {
            $_SESSION['MESSAGE'] = "WRONG PASSWORD!";
            header("Location: ../Login.php?error=passwordincorrect");
            exit();
        }

        $_SESSION['USER_EMAIL'] = $email;

        return true;

    }

    private function emptyInput(...$inputs) {

        foreach($inputs as $input) {
            if(empty($input)) {
                return true;
            }
        }
        return false;

    }

}

?>