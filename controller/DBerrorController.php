<?php
$controller = 'controller';
session_start();
// if(empty($_SESSION['error'])) {
// 	header ( 'Location:HomeController.php' );die();
// }

include_once '../view/header.php';
echo "<div><h1 style=\"color:red\">" . $_SESSION['error'] . "</h1></div>";
include_once '../view/footer.php';