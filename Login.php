<?php session_start(); ?>
<!DOCTYPE html>
<?php 

    if(isset($_SESSION['MESSAGE'])) {
        echo "<script>alert('" . $_SESSION['MESSAGE'] . "');</script>";
        unset($_SESSION['MESSAGE']);
    }
    
    // imports
    include_once "Includes/Head.php";
?>
<body class="h-screen w-screen overflow-hidden">

    <div class="flex h-full">

        <!-- LEFT SIDE -->
        <div class="w-1/2 bg-[#EAEAEA] flex items-center justify-center">
            <div class="w-md space-y-8">

                <!-- Logo -->
                <div>
                    <h1 class="text-lg tracking-widest text-[#FEDF59] font-bold">
                        SKILLS <span class="text-[#1E1E1E]">CLINIC</span>
                    </h1>
                </div>

                <!-- Welcome Text -->
                <div>
                    <p class="text-xs font-bold text-[#313038] mb-1">Equip the future</p>
                    <h2 class="text-2xl font-bold text-[#313038]">
                        Welcome Fellow Learner
                    </h2>
                </div>

                <!-- Form -->
                <form class="space-y-10 text-[#313038]" method="POST" action="./Process/Login.Process.php">

                    <!-- Email -->
                    <div class="relative mt-6">
                        <label class="absolute -top-2 left-3 text-sm font-bold px-1 bg-[#EAEAEA]">Email</label>
                        <input required name="Login_Email" type="email"
                            class="w-full mt-1 border border-[#313038] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Password -->
                    <div class="relative mt-6">
                        <label class="absolute -top-2 left-3 text-sm font-bold px-1 bg-[#EAEAEA]">Password</label>
                        <input required name="Login_Password" type="password"
                            class="w-full mt-1 border border-[#313038] px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Login Button -->
                    <button name="Login_btn" type="submit"
                        class="w-full bg-[#1E1E1E] text-white py-2 font-bold hover:bg-gray-800 transition cursor-pointer">
                        Login
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center">
                    <div class="flex-grow h-px bg-gray-300"></div>
                    <span class="px-3 text-xs text-gray-500">Doesn't have an account?</span>
                    <div class="flex-grow h-px bg-gray-300"></div>
                </div>

                <!-- Local Button -->
                <div class="text-center">
                    <a href="./Register.php" class="border border-gray-400 px-6 py-1 text-sm hover:bg-gray-200 transition cursor-pointer">
                        Register
                    </a>
                </div>

            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="w-1/2 bg-gray-800 flex items-center justify-center relative">

            <!-- Simple Placeholder Illustration -->
            <div class="flex items-center space-x-12">

                <img class="scale-70" src="Assets/Code.svg" alt="Login Illustration" class="w-64">

            </div>

        </div>

    </div>

</body>
</html>