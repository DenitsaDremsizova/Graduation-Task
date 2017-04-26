<?php
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    if(isset($_GET['id'])) {
        $getId = $_GET['id'];
    } else {
        $getId = $userId;
    }
        
    $profPicDAO = new PhotoDAO();
    $profPic = $profPicDAO->getProfilePic($getId);
    echo json_encode($profPic);
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}

?>