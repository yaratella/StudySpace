<?php
//I'll leave this php side empty, but this will also be paired up with SQL to handle
//This is for user registering and making a password information

//Ask TA how to connect a SQL table to the database: Make the following table: StudySpaceUsers

//StudySpaceUsers will store the following information (NOT IN ARRAY) User's firstName, User's lastName, User's username, User's password, User's Email, User's phoneNumber

$firstName = "";

$lastName = "";

$username = "";

$password = "";

$email = "";

$phoneNumber = 0000000000; //Storing it as a default number so that when needed to verify user info, it can work out.

//Requirements (I will be checking this with IF-Statements)

//If Password has the following characters: #, %, /, ., @, # <---MUST CONTAIN
//If password is higher than 10 characters (not allowed to be short)
//If password has first or last name (not allowed)

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Let's Register</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleRegister.css" rel="stylesheet">
        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="WelcomingMessage">
            <h2>Welcome to StudySpace</h2>
            <h4>Let's get Get Started</h4>
        </div>
        <div class="wrapper">
            <form action="">
                <h1>Sign Up</h1>

                <!-- First and Last name for Password Requirements + Future Use -->
                <div class="input-box">
                    <input type="text" placeholder="First Name" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-rename"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Last Name" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-rename"></i>
                </div>

                <!-- Username + Password: User Creativity -->
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

                <!-- Email and Phone number in case they forget their password! -->

                <div class="input-box">
                    <input type="text" placeholder="Email" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-at"></i>
                </div>

                <button type="submit" class="btn">Sign Up</button>

            </form>
        </div>
    </body>
</html>