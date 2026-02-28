<?php session_start(); ?>
<!DOCTYPE html>
<?php 

    if(!isset($_SESSION['USER_EMAIL'])) {
        header("Location: Login.php");
        exit();
    }

    if(isset($_SESSION['MESSAGE'])) {
        echo "<script>alert('" . $_SESSION['MESSAGE'] . "');</script>";
        unset($_SESSION['MESSAGE']);
    }

    // imports
    include_once "Includes/Head.php";
?>
<body class="h-screen w-screen overflow-hidden">

    <div class="flex h-full">

        <!-- Welcome Page -->
        <div class="w-full bg-gray-800 flex items-center justify-center relative">

            <!-- Simple Placeholder Illustration -->
            <div class="flex flex-col items-center space-x-12">

                <img class="scale-70" src="Assets/Code.svg" alt="Login Illustration" class="w-64">
                <h1 class="text-white text-2xl font-bold">Welcome to Skills Clinic</h1>

            </div>

        </div>

    </div>

</body>
</html>