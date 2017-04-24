<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();

if (isset ($_SESSION ['userId'] )) {
	$userId = $_SESSION ['userId'];
	
	$dao = new FriendDAO();
	echo json_encode($dao->listAllFriends($userId));
} else {
	http_response_code(401);
	echo '{"error": "not logged in"}';
}

?>