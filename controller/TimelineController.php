<?php
session_start();
$_SESSION['userId'] = 1;

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $_SESSION['timelineId'] = $_SESSION['userId']; 
    if (isset($_GET['timelineId'])) {
        $_SESSION['timelineId'] = $timelineId = $_GET['timelineId'];
    }
    //TO DO: if not mine or friend's timeline show limited info
    include '../view/timeline.php';
} else {
    header('Location:../view/index-register.php', true, 302);
}

?>
