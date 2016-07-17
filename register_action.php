<?php
include "connection.php";
$flag=0;
if($_POST['name']==""){
	$flag=1;
}else if($_POST['password']==""){
	$flag=1;
}else if ($_POST['email']==""){
	$flag=1;
}
if($flag){
	header('location:register.php?error=1');
}
else{
	$con=new Connection('ecom');
	$array=[
			$_POST['name'],
			$_POST['password'],
			$_POST['email'],
	];
	$con->insertUser($array);
	header('location:login.php');
}