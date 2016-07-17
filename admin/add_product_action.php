<?php
include "connection.php";
$flag=0;
if($_POST['name']==""){
	$flag=1;
}else if($_POST['content']==""){
	$flag=1;
}else if ($_POST['price']==""){
	$flag=1;
}
if($flag){
	header('location:home.php?error=1');
}
else{
	$con=new Connection('ecom');
	$array=[
			$_POST['name'],
			$_POST['content'],
			$_POST['price'],
	];
	$con->insertProduct($array);
	header('location:home.php');
}