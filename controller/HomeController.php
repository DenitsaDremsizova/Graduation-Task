<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}


$system = new System();
$countries = $system->getAllCountries();

$path = "../view/index-register.php";
include $path;
