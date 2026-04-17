<?php

//start session

session_start();

if(!isset($_SESSION['userID'])){
    //Redirect the user to login if they are not logged in yet
    header("Location: ../login.php");
    exit();
}

//copy from other files where you figured out how to connect to your data base
//don't forget to include password.php and all other necessary files

include "../connect.php";
include "../password.php";

//define userID (just like in studystats.php)
$userID = (int) $_SESSION['userID'];
//data you'd have to decode and get the contends from php://input
$data = json_decode(file_get_contents("php://input"), true);
//and also figure out the hours too
$time = (float) $data['hours'];


//then this will update the study hours (then this will be called by all other files that will need to update the time)

//Getting the user's total study hours
//Got this from my previous connection attempts (login.php)
//Using my prepared statement to prevent attackers from getting in

$stmt = $conn->prepare("UPDATE StudySpaceUserAccounts SET totalStudyHours = totalStudyHours + ? WHERE id = ?");
$stmt->bind_param("di", $time, $userID);
$stmt->execute();



//then close the stmt and the conn to everything in this file (so that new data can come and go)


$stmt->close();
$conn->close();

?>