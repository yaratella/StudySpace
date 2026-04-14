<?php

//This space will be used to access the database and send and email to them, then refactor the password again

//Ask TA For Help on how to access data from an SQL database and manipulate it!


//Make sure that the new password isn't the old password, and that it

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Login</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleForgotPassword.css" rel="stylesheet">
        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="WelcomingMessage">
            <h2>Don't Get Locked out!</h2>
            <h4>Let's Fix Things</h4>
        </div>
        <div class="wrapper">
            <form action="">
                <h1>Forgot Password</h1>
                <br>
                <h3>Enter Your Email and the new password you would like</h3>
                <div class="input-box">
                    <input type="text" placeholder="Email" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-at"></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="New Password" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Change Password</button>

                <div class="register-link">
                    <p>Dont have an account?<a href="register.php"> Register</a></p>
                </div>
            </form>
        </div>
    </body>
</html>