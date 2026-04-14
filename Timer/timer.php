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
                <h3>Scroll and  pick out how long you would like to focus</h3>
            </div>

            <!-- Need to: Command these so that when they are clicked, It navigates to a timer feature (with similar background to the stopwatch feature) -->


            <div id="AllButtons">
                <a href="choice.php" id="btn3hr">3 Hours</a>


                <a href="choice.php" id="btn2hr">2 Hours</a>

        
                <a href="choice.php" id="btn1hr">1 Hour</a>


                <a href="choice.php" id="btn30min">30 Minutes</a>


                <a href="choice.php" id="btn25min">25 Minutes</a>


                <a href="choice.php" id="btn15min">15 Minutes</a>
            </div>

            <script src="index.js"></script>
            <a id="backBTN" href="https://cs.colostate.edu:4444/~C836987719/StudySpace/homepage.php" class="goBack">Back</a>

        </div>
    </body>

</html>