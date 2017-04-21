<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$_SESSION ['timelineid'] = 1; //to be deleted;

if (isset ($_SESSION ['timelineid'] )) {
	$timelineid = $_SESSION ['timelineid'];
	
	$dao = new PostDAO();
	echo json_encode($dao->listAllPosts($timelineid));
} else {
	http_response_code(401);
	echo '{"error": "not logged in"}';
}

?>
