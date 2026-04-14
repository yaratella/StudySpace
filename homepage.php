<?php
//I will update this later with SQL to load/handle each user's saved information
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Home</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleHomepage.css" rel="stylesheet">

        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- User Section -->
        <div class="section">
            <div class="content">
                <h1 class="title">Welcome to StudySpace</h1>
                <h2 class="subtitle">Your Personal Study Area</h2>
                <p class="description">Organize your thoughts, track your progress, and achieve your academic goals in one beautiful space!</p>
                <div class="buttons">
                    <a href="extras/tutorial.html" class="getStarted">Get Started</a>
                    <a href="extras/learnMore.html" class="learnMore">Learn More</a> <!--Need to make another reference website soon -->
                </div>
            </div>
        </div>
        <!-- Features Section (They'd still have to navigate to the navbar to click on where to go) -->
        <div class="featuresSection">
            <div id="StudyTools">
                <i class='bx bx-book-reader feature-icon'></i>
                <h3>Study Tools</h3>
                <p>Be able to have access to amazing tools that can aid your study goals.</p>
                <br>
                <a href="StudyTools/studyTools.php" class="goStudyTools">Go!</a>
            </div>
            <div id="StudyCalendar">
                <i class='bx bx-calendar feature-icon'></i>
                <h3>Calendar</h3>
                <p>Plan your study sessions and keep track of important deadlines and tasks.</p>
                <br>
                <a class="goCalendar">Go!</a>
            </div>
            <div id="stopwatch">
                <i class='bx bx-stopwatch feature-icon'></i>
                <h3>StopWatch</h3>
                <p>Track your study time with precision and monitor your focus sessions.</p>
                <br>
                <a href="StopWatch/stopwatch.php" class="goStopWatch">Go!</a>
            </div>
            <div id="timer">
                <i class='bx bx-timer feature-icon'></i>
                <h3>Timer</h3>
                <p>Set study timers to maintain focused work sessions and take proper breaks.</p>
                <br>
                
            </div>
            <div id="studyStats">
                <i class='bx bx-bar-chart-alt-2 feature-icon'></i>
                <h3>Study Statistics</h3>
                <p>View overall analytics of all of your study sessions and track your progress over time.</p>
                <br>
                <a class="goStudyStats">Go!</a>
            </div>
            <div id="Profile">
                <i class='bx bxs-user'></i>
                <h3>Profile</h3>
                <p>Take a look at your profile and customize it.</p>
                <br>
                <a class="goProfile">Go!</a>
            </div>
        </div>
    </body>
</html>