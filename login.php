<?php

session_start();
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

include "connect.php";
include "password.php";

if(isset($_POST['login'])){
    $userName = trim($_POST['username']);
    $plainPassword = $_POST['password'];
    $errorMsg = ""; //In case anything happens later on

    //Using my prepared statement to prevent attackers from getting in
    $stmt = $conn->prepare("SELECT id, passwordHash, firstName FROM StudySpaceUserAccounts WHERE username = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();


    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        //Now time to verify the password

        if(password_verify($plainPassword, $row['passwordHash'])){
            //after verifying the password! We'll redirect to user's HOMEpage!
            $_SESSION['userID'] = $row['id'];
            $_SESSION['username'] = $userName;
            $_SESSION['firstName'] = $row['firstName'];

            header("Location: homepage.php");
            exit();
        }else{
            $errorMsg = "Incorrect password!";
        }

    }else{
        $errorMsg = "Username not found!";
    }

    $stmt->close();
}

$conn->close();

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
            <form method="POST" action="login.php">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <!-- This will add a small lock (for password) in the textbox-->
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="forgotPassword.php">Forgot password?</a>
                </div>

                
            <!--Place to put the errors at the end --->
             <?php
                    if(isset($errorMsg) && $errorMsg != ""){
                        echo "Error: ".$errorMsg;
                    }
                ?> <br>

                 <br><button type="submit" name="login" class="btn">Login</button>

                <div class="register-link">
                    <p>Dont have an account?<a href="register.php"> Register</a></p>
                </div>
            </form>
        </div>
    </body>
</html>