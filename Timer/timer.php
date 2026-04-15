<?php

//This will be a section to give the user options of how long they would like to study. Options include:

// 3hours, 2 hours, 1 hour, 30 minutes, 25 minutes, 15 minutes.

//Greet the user, ten have them click on an option, record what they will pick and use it with some javascript to figure out which option to set the display as

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Timer</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleTimer.css" rel="stylesheet">

        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="body">
            <div id="WelcomingMessage">
                <h1>Timer</h1>
                <h3>Pick how long you would like to focus</h3>
            </div>

            <!-- Need to: Make a dropdown menu instead! -->


            <div id="dropdownContainer">

                <select id="timerDropdown" onchange="setTimer()"> 
                    <!-- Found all of these values in miliseconds to use in my javascript  -->
                    <option value="">Select Duration</option>
                    <option value="10800000">3 Hours</option>
                    <option value="7200000">2 Hours</option>
                    <option value="3600000">1 Hour</option>
                    <option value="1800000">30 Minutess</option>
                    <option value="1500000">25 Minutes</option>
                    <option value="900000">15 Minutes</option>
                </select>
            </div>

            <div id="timerDisplay" style="display: none;"> 
                <!-- Don't want anything to display unless the user actually picks an option  -->
                <div id="container">
                    <div id="display">
                        <p>00:00:00</p>
                    </div>
                

                    <!-- Brought from my stopwatch controls  -->
                    <div id="controls">
                        <button id="startBtn" onclick="start()">START</button>
                        <button id="stopBtn" onclick="stop()">STOP</button>
                    </div>
            </div>
        </div>
        <script src="index.js"></script>
        <a id="backBTN" href="https://cs.colostate.edu:4444/~C836987719/StudySpace/homepage.php" class="goBack">Back</a>
    </body>

</html>