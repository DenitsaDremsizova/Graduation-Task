<?php 
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start ();
if(empty($_SESSION['userId'])) {
	header ( 'Location:Timeline-friendsController.php' );die();
}
$id = $_SESSION['userId'];
if($_SERVER ['REQUEST_METHOD'] === 'DELETE') {
	$friendId= file_get_contents('php://input');
	try {
	
	$dao = new FriendDAO();

	
	$checkIfInFriendsList = $dao->checkIfInFriendsList($id,$friendId);
	$checkIfInFriendRequestList = $dao->checkIfInFriendRequestList($id,$friendId);

	if($checkIfInFriendRequestList && !$checkIfInFriendsList) {

		$dao->deleteFriendRequest ($friendId,$id);

	}
	} catch ( Exception $e ) {

		header ( 'Location:Timeline-friendsController.php' );die();
	}
}
?>