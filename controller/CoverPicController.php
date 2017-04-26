<?php

try {

    function __autoload($className) {
        require_once "../model/" . $className . '.php';
    }

    session_start();
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $getId = (isset($_GET['id'])) ? $_GET['id'] : $userId;

        $covPicDAO = new PhotoDAO();
        $covPic = $covPicDAO->getCoverPic($getId);
        echo json_encode($covPic);
    }
} catch (PDOException $e) {
    $_SESSION['error'] = 'Something went wrong, please try again later!';
    header('Location:DBerrorController.php');
    die();
}

?>