<?php 
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start ();
if(empty($_SESSION['userId'])) {
	header ( 'Location:Timeline-friendsController.php' );die();
}
$id = $_SESSION['userId'];
if($_SERVER ['REQUEST_METHOD'] === 'POST') {
	$friendId= file_get_contents('php://input');
	try {
	
	$dao = new FriendDAO();

	
	$checkIfInFriendsList = $dao->checkIfInFriendsList($id,$friendId);
	$checkIfInFriendRequestList = $dao->checkIfInFriendRequestList($id,$friendId);
// 	var_dump($checkIfInFriendsList);
// 	var_dump($checkIfInFriendRequestList);
	if($checkIfInFriendRequestList && !$checkIfInFriendsList) {
// 		$dao->deleteFriendRequest($friendId,$id);
		$date = date("Y-m-d");
		$dao->addNewFriend($friendId,$id,$id,$friendId,$date);
		var_dump($error);
// 		$dao->acceptFriendRequest ($id,$friendId,$date);
	}
	} catch ( Exception $e ) {
		echo $e->getMessage ();die();
// 		$_SESSION ['error'] = $e->getMessage ();
// 		header ( 'Location:Timeline-friendsController.php' );die();
	}
}
?>