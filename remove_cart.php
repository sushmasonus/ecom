<?php
include "connection.php";
$con=new Connection('ecom');
$id=$_GET['id'];
$con->removeCart($id);
header('location:view_cart.php');