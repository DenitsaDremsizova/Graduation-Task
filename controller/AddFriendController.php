<?php 
try {
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start ();
if(empty($_SESSION['userId'])) {
	header ( 'Location:Timeline-friendsController.php' );die();
}
$userId = $_SESSION['userId'];
if($_SERVER ['REQUEST_METHOD'] === 'POST') {
	$friendId= file_get_contents('php://input');
	try {
	
	$dao = new FriendDAO();

	
	$checkIfInFriendsList = $dao->checkIfInFriendsList($userId,$friendId);
	$checkIfInFriendRequestList = $dao->checkIfInFriendRequestList($userId,$friendId);

	if(!$checkIfInFriendRequestList && !$checkIfInFriendsList) {

		$dao->sendFriendRequest($userId,$friendId);

	}
	} catch ( Exception $e ) {

		header ( 'Location:Timeline-friendsController.php' );die();
	}
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>