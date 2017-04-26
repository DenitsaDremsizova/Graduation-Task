<?php
$controller = 'controller';
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    
    $userId = $_SESSION['userId'];
    
    $getId = (isset($_GET['id'])) ? $_GET['id'] : $userId;
    
    //get Gallery Owner Name and Address:
    $dao = new FriendDAO();
    $galleryOwner = $dao->getOneFriend($getId);
    $galleryOwnerName = $galleryOwner->firstName . " " . $galleryOwner->lastName;
    $galleryOwnerAddress = $galleryOwner->city . ", " . $galleryOwner->country;
    
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
} else {
    header ( 'Location:HomeController.php' );die();
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>