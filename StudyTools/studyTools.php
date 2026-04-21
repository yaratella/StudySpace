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
        <link rel="stylesheet" href="styleStudyTools.css" rel="stylesheet">

        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
            <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
    </head>

    <body>
<div class="container">
      <a id="backBtn" href="../homepage.php" class="goBack">Back</a>
      <div class="add-flashcard-con">
        <button id="add-flashcard">Add Flashcard</button>
      </div>

      <!-- Display Card of Question And Answers Here -->
      <div id="card-con">
        <div class="card-list-container"></div>
      </div>
    </div>

    <!-- users prompted to fill question and answer -->
    <div class="question-container hide" id="add-question-card">
      <h2>Add Flashcard</h2>
      <div class="wrapper">
        <!-- Display Error message -->
        <div class="error-con">
          <span class="hide" id="error">Input fields cannot be empty!</span>
        </div>
        <!-- Close the Button -->
        <i class="fa-solid fa-xmark" id="close-btn"></i>
      </div>

      <label for="question">Question:</label>
      <textarea
        class="input"
        id="question"
        placeholder="Type the question here..."
        rows="2"
      ></textarea>
      <label for="answer">Answer:</label>
      <textarea
        class="input"
        id="answer"
        rows="4"
        placeholder="Type the answer here..."
      ></textarea>
      <button id="save-btn">Save</button>
    </div>

    <!-- Script -->
    <script src="tools.js"></script>
  </body>
</html>