<?php
$controller = 'controller';
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
if(!empty($_GET['logout'])) {
	session_destroy();
}
$homeController = true;
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if(!empty($_SESSION['userId'])) {
	header('Location:TimelineController.php');die();
}

$system = new System();
$countries = $system->getAllCountries();

$path = "../view/index-register.php";
include $path;
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
