<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    
    $userId = $_SESSION['userId'];
    
    if(isset($_GET['id'])) {
        $getId = $userId;
    } else {
        $getId = $_GET['id'];
    }
    
    $profPic = "";
    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $profilePic = json_decode($_POST['data']);
    $profPic = $profilePic->id;
    }
    
    
    include_once '../view/timeline-gallery.php';
}

?>
