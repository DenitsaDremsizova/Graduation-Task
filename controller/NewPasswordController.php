<?php
try {
if (version_compare(PHP_VERSION, "5.4.0") >= 0) {
	$sess = session_status();
	if ($sess == PHP_SESSION_NONE) {
		session_start();
	}
} else {
	if (!$_SESSION) {
		session_start();
	}
}

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}


if (($_SERVER ['REQUEST_METHOD'] === "POST") && (! empty (file_get_contents('php://input')))) {
	$email = file_get_contents('php://input');
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
	$password = '';
	for ($i = 0; $i < 5; $i++) {
		$n = rand(0, count($alphabet)-$i);
		$password .= $alphabet[$n];
		$password .= rand(1,9);
	}
	try {
	
		$loginUser = new User($email,$password);
		
		$userObject = new Login($loginUser);
		
			if(empty($userObject->checkEmailExist($email))) {
					throw new LoginException("Email doesn't exist!");
			}

			$userObject->ResetPassowrd($email,$password);
			$userObject->sendNewPassowrd($email, $password);
		
		
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>