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
            <script src="index.js"></script>
            <a href="https://cs.colostate.edu:4444/~C836987719/StudySpace/homepage.php" class="goBack">Back</a>
        </div>
    </body>
</html>