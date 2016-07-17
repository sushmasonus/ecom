<?php
include "connection.php";
$con = new Connection('new1');
$array = [
	$_POST['name'],
	$_POST['content'],
	$_POST['id'],

];
$update = $con->updateBlog($array);
header('location:home.php');
