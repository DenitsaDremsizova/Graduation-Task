<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
$userId = '';
$id='';
if(!empty($_SESSION['userId'])) {
	$userId = $_SESSION['userId'];
}
$getId = $_SESSION['userId'];
if(empty($_GET['id'])) {
	$id = $userId;
}else {
	$id = $_GET['id'];
	$getId=$id;
}
if (empty($id)) {
	header('Location:HomeController.php');die();
}

	$dao = new FriendDAO();

	$checkIfInFriendsList = $dao->checkIfInFriendsList($userId,$getId);

	$checkIfInFriendRequestList = $dao->checkIfInFriendRequestList($userId,$getId);

	

$userFollowers = DbHelper::getInstance()->countUserFollowers($id);
$userData = DbHelper::getInstance()->getUserData($id);
$userAddress = DbHelper::getInstance()->getUserAddress($id);
$userFriendsRequests = DbHelper::getInstance()->countUserRequests($id);
// var_dump($userFriendsRequests);die();
$age = floor((time() - strtotime($userData[0]['date_of_birth'])) / 31556926);

// var_dump($userFollowers);die();
if(isset($_GET['search'])) {
	$search = $_GET['search'];
}
include '../view/timeline-friends.php';



?>

