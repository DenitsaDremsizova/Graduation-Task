<?php
$homeController = true;
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if($_SESSION['userInfo']) {
	echo 123;die();
}

$system = new System();
$countries = $system->getAllCountries();

$path = "../view/index-register.php";
include $path;
