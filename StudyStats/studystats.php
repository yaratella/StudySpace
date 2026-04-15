<?php
if(!isset($_SESSION['userID'])){
    //Redirect the user to login if they are not logged in yet
    header("Location: ../login.php");
    exit();
}

//Including all of the files that help connect to my database
include "../connect.php";
include "../password.php";

$userID = (int) $_SESSON['userID'];

//Getting the user's total study hours
//Got this from my previous connection attempts (login.php)
//Using my prepared statement to prevent attackers from getting in
$stmt = $conn->prepare("SELECT totalStudyHours, firstName FROM StudySpaceUserAccounts WHERE id = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

$totalHours = $userData['totalStudyHours'];
$firstName = $userData['firstName'];

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Study Statistics</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleStudyStats.css" rel="stylesheet">
        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <!-- found a website with guides on creating a chart: https://www.chartjs.org/docs/latest/getting-started/ -->
         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <div class="body">
            <div id="header">
                <h1>Study Statistics</h1>
                <p>Your study progress, <?= htmlspecialchars($firstName) ?></p>
            </div>

            <div id="statsContainer">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class='bx bxs-time'></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Study Hours</h3>
                        <p class="stat-value"><?= $totalHours ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                    </div>
                    <div class="stat-info">
                        <h3>Study Streak</h3>
                        <p>Coming soon...</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class='bx bxs-trophy'></i>
                    </div>
                    <div class="stat-info">
                        <h3>Achievement</h3>
                        <p class="stat-value">
                            <?php
                            if($totalHours >= 100) echo "Study Master";
                            elseif($totalHours >= 50) echo "Study Expert";
                            elseif($totalHours >= 20) echo "Study Enthusiast"; 
                            else echo "just Started";
                            ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Sourced from chart website --->
            <div id="chartContainer">
                <canvas id="studyChart"></canvas>
            </div>

            <a id="backBtn" href="../homepage.php" class="goBack">Back</a>
    </body>
</html>