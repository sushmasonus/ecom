<?php
session_start();
include "connection.php";
$con=new Connection('ecom');
$sql="select user.id from user where user.email=? && user.password=?";
$stmt=$con->db->prepare($sql);
$stmt->execute([
			$_POST['email'],
			$_POST['password'],
	]);
$user_id=$stmt->fetchColumn();
if (is_numeric($user_id)){
	$_SESSION['user_id']= $user_id;
	header('location:products.php');
}
else{
	header('location:login.php?error=1');
}
