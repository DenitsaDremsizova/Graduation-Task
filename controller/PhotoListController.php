<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId']+0;
    
    $dao = new PhotoDAO();
    
    //if ($_SERVER ['REQUEST_METHOD'] === 'GET') {
        
        // list all photos
        echo json_encode($dao->listAllPhotos($userId));
    //}
}

