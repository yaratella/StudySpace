<?php
//I'll leave this php side empty, but this will also be paired up with SQL to handle
//login information

/*

//user input
$userPassword = $_POST['password']

//securely hash the password
$hashedPassword = password_hash($userPassword,PASSWORD_DEFAULT);

// Store $hashedPassword in your MySQL database using a prepared
statement


how do we verify the password?: compare the given password and the actual password
*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Login</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleLogin.css" rel="stylesheet">
        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="WelcomingMessage">
            <h2>Welcome Back to StudySpace</h2>
            <h4>Let's get Some Work Done</h4>
        </div>
        <div class="wrapper">
            <form action="">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <!-- This will add a small lock (for password) in the textbox-->
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="forgotPassword.php">Forgot password?</a>
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="register-link">
                    <p>Dont have an account?<a href="register.php"> Register</a></p>
                </div>
            </form>
        </div>
    </body>
</html>