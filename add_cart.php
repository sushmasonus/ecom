<?php
session_start();
include "connection.php";
$con=new Connection('ecom');
$user_id=$_SESSION['user_id'];
$product_id=$_GET['id'];
$con->insertCart($product_id,$user_id);
header('location:products.php?added=1');

