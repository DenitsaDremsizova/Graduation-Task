<?php
$controller = 'controller';
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    
    $userId = $_SESSION['userId'];
    
    if(!isset($_GET['id'])) {
        $getId = $userId;
    } else {
        $getId = $_GET['id'];
    }
    
    $profPic = "";
    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $profilePic = json_decode($_POST['data']);
    $profPic = $profilePic->id;
    }

    $dao = new FriendDAO();
    $galleryOwner = $dao->getOneFriend($getId);
    $userName = $galleryOwner->firstName . " " . $galleryOwner->lastName;
    $userAddress = $galleryOwner->city . ", " . $galleryOwner->country;
    $userFriendsRequests = DbHelper::getInstance()->countUserRequests($_SESSION['userId']);
    include_once '../view/timeline-gallery.php';
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>