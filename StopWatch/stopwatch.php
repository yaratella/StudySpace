<?php

session_start();

include "../connect.php"; //connect to the database
include "../password.php";

//if they're not logged in then they can't access this page
if(!isset($_SESSION['userID'])){
    header("Location: ../login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace StopWatch</title>
        <link rel="stylesheet" href="styleStopwatch.css">
    </head>

    <body>
        <div class="body">
            <h1 id="myH1">Stopwatch</h1>
            <div id="container">

                <div id="display">
                    <br><p>00:00:00:00</p>
                </div>

                <div id="controls">
                    <button id="startBtn" onclick="start()">START</button>
                    <button id="stopBtn" onclick="stop()">STOP</button>
                    <button id="resetBtn" onclick="reset()">RESET</button>
                </div>

            </div>
            <script src="index-stopwatch.js"></script>
            <a href="../homepage.php" class="goBack">Back</a>
        </div>
    </body>
</html>