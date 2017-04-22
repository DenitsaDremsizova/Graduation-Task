<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$_SESSION ['userid'] = 1; //to be deleted;

if (isset ($_SESSION ['userid'] )) {
	$userId = $_SESSION ['userid'];
	
	$dao = new FriendDAO();
	echo json_encode($dao->listAllFriends($userId));
} else {
	http_response_code(401);
	echo '{"error": "not logged in"}';
}

?>