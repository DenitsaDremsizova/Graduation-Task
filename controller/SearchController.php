<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
// if (isset ( $_GET ['submit'] )){
// 	if(!empty($_GET['search'])) {
// 		$email = $_GET['search'];
		if(isset($_GET['email'])) {
			$email = $_GET['email'];
			$email .= '%';
			$dao = new FriendDAO();
			echo json_encode($dao->getUsersByEmail($email));
		}
// 	}
// }


