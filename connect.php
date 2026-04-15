<?php

/*

//user input
$userPassword = $_POST['password']

//securely hash the password
$hashedPassword = password_hash($userPassword,PASSWORD_DEFAULT);

// Store $hashedPassword in your MySQL database using a prepared
statement


how do we verify the password?: compare the given password and the actual password
*/

header('Access-Control-Allow-Origin: *');

include "password.php";
$servername = "helmi";
$username = "C836987719";
$db = "C836987719";
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>