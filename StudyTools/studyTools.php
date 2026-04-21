<?php

//I will update this later with SQL to load/handle each user's saved information

session_start();
//isset to check if the user is logged in

if(!isset($_SESSION['userID'])){
    //if they're not, user will be redirected to login.php
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Tools</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleHomepage.css" rel="stylesheet">

        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Starting off with flashcards: make each flashcard into a div, or make it into a class? --->
        <div class="container">
            <div class="add-flashcard-con">
                <button id="add-flashcard">Add Flashcard</button>
            </div>
            <!-- Display the cardof auestion and answers here! --->
            <div id="card-con">
                <div class="card-list-container"></div>
            </div>
         <!-- Input form for the users to fill the question and then the answer for their flashcards --->
          <div class="question-container hide" id="add-question-card">
                <h2>Add Flashcard</h2>
                <div class="wrapper">
                    <!--- Error Message --->
                    <div class="error-con">
                        <span class="hide" id="error">Input fields can't be empty!</span>
                    </div>
                    <!--- Close Button --->
                    <i class="fa-solid fa-xmark" id="close-btn"></i>
                </div>

                <label for="question">Question:</label>
                <textarea class="input" id="question" placeholder="Type the question here..." rows="2"></textarea>

                <label for="answer">Answer:</label>
                <textarea class="input" id="answer" placeholder="Type the answer here..." rows="4"></textarea>

                <button id="save-btn">Save</button>
        </div>
        <script src="tools.js"></script>
    </body>
</html>