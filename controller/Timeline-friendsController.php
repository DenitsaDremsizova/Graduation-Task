<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
// $_SESSION ['userId'] = 1;
if (!isset ($_SESSION ['userId'] )) {
	header('Location:../HomeController.php', true, 302);
}
$id = $_SESSION['userId'];
$userFollowers = DbHelper::getInstance()->countUserFollowers($id);
// var_dump($userFollowers);die();
if(isset($_GET['search'])) {
	$search = $_GET['search'];
}
include '../view/timeline-friends.php';



?>

