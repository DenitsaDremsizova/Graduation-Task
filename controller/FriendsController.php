<?php
try {
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$userId = '';
$id = '';
if(!empty($_SESSION['userId'])) {
	$userId = $_SESSION['userId'];
}else {
	header('Location:HomeController.php');die();
}

if(empty($_GET['id'])) {
	$id = $userId;
}else {
	$id = $_GET['id'];
	$getId=$id;
}

if (empty($id)) {
	header('Location:HomeController.php');die();
}
	$userId = $_SESSION ['userId'];
	
	$dao = new FriendDAO();
	echo json_encode($dao->listAllFriends($id));

} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>