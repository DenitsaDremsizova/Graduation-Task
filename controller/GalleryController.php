<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    include_once '../view/timeline-gallery.php';
}

?>
