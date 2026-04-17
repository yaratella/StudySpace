<?php
session_start();
include "connect.php";
include "password.php";

//Making a new table
//Changed this later on so that it can house floats, NOT INTS
$sql = "CREATE TABLE IF NOT EXISTS StudySpaceUserAccounts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        firstName VARCHAR(256) NOT NULL,
        lastName VARCHAR(256) NOT NULL,
        username VARCHAR(256) UNIQUE NOT NULL,
        email VARCHAR(256) NOT NULL,
        passwordHash VARCHAR(255) NOT NULL,
        totalStudyHours INT DEFAULT 0,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(isset($_POST['create'])){
    //Storing all of the values that the user names in this table
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $plainPassword = $_POST['password'];
    $email = $_POST['email'];

    //MAKING SURE THE PASSWORD IS VALID

    $hasError = false; //Default
    $errorMsg = ""; //Default

    //What makes it valid: it has a special character, adn at least 10 characters!
    //password can't have first and last name

    //Checking for length
    if(strlen($plainPassword) < 10){
        $hasError = true;
        $errorMsg .= "Password must be at least 10 characters. ";
    }

    //Checking for special Characters: #, %, /, ., @, $
    $requiredChars = ['!','@','#','$','%','.', '/'];
    $hasOne = false;

    foreach($requiredChars as $char){
        if(strpos($plainPassword, $char) !== false){ //Searches for any occurance of any character in the array
            $hasOne = true;
            break;
        }
    }

    if(!$hasOne){
        $hasError = true;
        $errorMsg .= "Password must contain a special character: ! @ # $ % % . /";
    }

    //Password can't contain first or last name
    if(stripos($plainPassword, $firstName) !== false || stripos($plainPassword, $lastName) !== false){
        $hasError = true;
        $errorMsg .= "Password cannot contain your first or last name. ";
    }

    //After all these checks if there's no errors, then user's plainPassword will be hashed

    if(!$hasError){
        //Steps to hash
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        //Insert all the valid data into the database
        $stmt = $conn->prepare("INSERT INTO StudySpaceUserAccounts (firstName, lastName, username, email, passwordHash) VALUES (?,?,?,?,?)");

        $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashedPassword);

        if($stmt->execute()){
            //If everything is working, and they have their info in their account, then user will be brought to login.php
            header("Location: login.php");
            exit();
        }else{
            //Checking if it already exists
            if(strpos($stmt->error, "Duplicate entry") !== false){
                echo "Username already exists";
            }else{
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    }

}

$conn->close();

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
            <form method="POST" action="register.php">
                <h1>Sign Up</h1>

                <!-- First and Last name for Password Requirements + Future Use -->
                <div class="input-box">
                    <input type="text" name="firstName" placeholder="First Name" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-rename"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="lastName" placeholder="Last Name" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-rename"></i>
                </div>

                <!-- Username + Password: User Creativity -->
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

                <!-- Email and Phone number in case they forget their password! -->

                <div class="input-box">
                    <input type="text" name="email" placeholder="Email" required>
                    <!-- This will add a small username font in the textbox!-->
                    <i class="bx bx-at"></i>
                </div>

                <!-- The Error Messages will display here if anything fails! It makes sense to keep them in the bottom --->
                 <?php 
                    if(isset($errorMsg) && $errorMsg != ""){
                        echo "Error: ".$errorMsg;
                    }
                    ?>

                <button type="submit" name="create" class="btn">Sign Up</button>

            </form>
        </div>
    </body>
</html>