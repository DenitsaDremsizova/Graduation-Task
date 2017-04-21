<?php
session_start();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
$ajax = false;
if (($_SERVER ['REQUEST_METHOD'] === 'POST') && (!empty($_POST ['user']))) {
	$userInfo = json_decode ( $_POST ['user'] );
	$_POST['submit'] = ($userInfo->submit) ? $userInfo->submit : null;  
	$_POST['Email'] = ($userInfo->email) ? $userInfo->email: null;  
	$_POST['password'] = ($userInfo->password) ? $userInfo->password: null;  
$ajax = true;
}

if (isset($_POST['submit'])) {
	try {
		$id = null;
		$email = $_POST['Email'];
		$password = $_POST['password'];
		
		$loginUser = new User($email,$password);
		
		$userObject = new Login($loginUser);
		
		$userObject->do();
	}
	catch (Exception $e) {
		if(!$ajax) {
			echo $_SESSION['error'] = $e->getMessage();
		}else {
			echo $e->getMessage();
		}
	}
	if(!$ajax) {
		header('Location:HomeController.php');die();
	}
}
?>