<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    
    $profPicDAO = new PhotoDAO();
    $profPic = $profPicDAO->getProfilePic($userId);
    echo json_encode($profPic);
}
    

?>
