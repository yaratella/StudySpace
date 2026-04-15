<?php

session_start();

//Using isset to make sure that the use is logged in

if(!isset($_SESSION['userID'])){
    header("Location: ../login.php");
    exit();
}

include "../connect.php";
include "../password.php";

$errorMsg = ""; //In case anything happens later on

$userID = (int) $_SESSION['userID'];

//Using my prepared statement to prevent attackers from getting in
$stmt = $conn->prepare("SELECT id, firstName, lastName, email, username, createdAt  FROM StudySpaceUserAccounts WHERE id = ?");

$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows > 0){
    $userData = $result->fetch_assoc();
}else{
    echo "User not found";
    exit();
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StudySpace Profile</title>

        <!-- Load my content for the login page -->
        <link rel="stylesheet" href="styleProfile.css">

        <!-- Online Icon Linked (incase I need to use it again) -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Making a container class so that I can blur it like the other pop-outs  -->
            <div class="prof-card">

                <div class="prof-header">
                    <i class='bx bxs-user-circle profile-icon'></i>

                    <!-- Greeting the User by the first and last name that they used when they registered  -->
                    <h1><?= htmlspecialchars($userData['firstName'])?> <?= htmlspecialchars($userData['lastName'])?></h1>
                </div>

                <div class="prof-info">
                    <!-- This will store the information about their account, but I wont show the total study hours since they will get an overview when looking at the study stats section  -->
                    <div class="info-item">
                        <label>Username:</label>
                        <p><?= htmlspecialchars($userData['username']) ?></p>
                    </div>
                    <div class="info-item">
                        <label>Email:</label>
                        <p><?= htmlspecialchars($userData['email']) ?></p>
                    </div>
                    <div class="info-item">
                        <label>Member:</label>
                        <p>You're the <?= $userData['id'] ?> member on our platform!</p>
                    </div>
                    <div class="info-item">
                        <label>Member Since:</label> 
                        <!-- SOURCED FROM W3SCHOOLS  --->
                        <p><?= date('Y-m-d', strtotime($userData['createdAt'])) ?></p>
                    </div>
                </div>

                <div class="prof-actions">
                    <!-- Allow Users to go back to the homepage, and also adding a log out feature that will end the session!  -->
                     <a href="../homepage.php" class="btn-back">Back</a>
                     <a href="../login.php?action=logout" class="btn-logout">Logout</a>
                </div>
</div>



    </body>

</html>