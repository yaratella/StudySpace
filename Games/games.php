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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudySpace Mind Games</title>
    <link rel="stylesheet" href="styleGame.css">
</head>
<body>

    <div id="game-wrapper">
        <!-- Step 1: Page Header -->
        <h1>Lights Out</h1>
        <p class="subtitle">Click any cell to toggle it and its neighbors. Use the color strip to pick your color.</p>

        <!-- Step 2: Color Strip Table -->
        <div id="strip-wrapper">
            <table id="color-strip">
                <tr>
                    <td id="strip-0" class="strip-cell" data-color="black"></td>
                    <td id="strip-1" class="strip-cell" data-color="red"></td>
                    <td id="strip-2" class="strip-cell" data-color="blue"></td>
                    <td id="strip-3" class="strip-cell" data-color="yellow"></td>
                    <td id="strip-4" class="strip-cell" data-color="green"></td>
                    <td id="strip-5" class="strip-cell" data-color="purple"></td>
                    <td id="strip-6" class="strip-cell" data-color="orange"></td>
                    <td id="strip-7" class="strip-cell" data-color="cyan"></td>
                    <td id="strip-8" class="strip-cell" data-color="magenta"></td>
                    <td id="strip-9" class="strip-cell" data-color="gray"></td>
                </tr>
            </table>
        </div>

        <!-- Step 3: Main Game Table -->
        <div id="grid-wrapper">
            <table id="game-grid"></table>
        </div>


        <h1>Memory Cards</h1>
        <div class="grid-container"></div>
        <p>Score:<span class="score"></span></p>
        <div class="actions">
            <button onclick="restart()">Restart</button>
        </div>
        <!-- The back button all the way at the bottom -->
        <a id="backBtn" href="../homepage.php" class="goBack">Back</a>

        </div>
        <!-- jQuery -->
    <script nonce="pa_js_2026" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Game logic -->
    <script nonce="pa_js_2026" src="lightsout.js"></script>

    <!-- jQuery interactions -->
    <script nonce="pa_js_2026" src="app.js"></script>

    <!-- Memory Game interactions! -->
     <script src="memory.js"></script>
</body>
</html>