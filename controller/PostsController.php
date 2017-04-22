<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$_SESSION ['userId'] = 1; //to be deleted

if (isset ($_SESSION ['userId']) && isset ($_SESSION ['timelineId'] )) {
	$timelineId = $_SESSION ['timelineId'];
	
	$dao = new PostDAO();
        
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
            // add new post
            $tuiOtJavaScripta = json_decode ($_POST['data']);
//            var_dump($tuiOtJavaScripta);
//            echo $tuiOtJavaScripta;

//            $id = isset($tuiOtJavaScripta->id) ? $tuiOtJavaScripta->id : null;
//
            $newPost = new Post($tuiOtJavaScripta->authorId, $tuiOtJavaScripta->timelineId, $tuiOtJavaScripta->type, $tuiOtJavaScripta->text);		
            $dao->addPost($newPost);
	} elseif ($_SERVER ['REQUEST_METHOD'] === 'GET') {
		// list all contacts
            echo json_encode($dao->listAllPosts($timelineId));
        }
} else {
	http_response_code(401);
	echo '{"error": "not logged in"}';
}

?>
