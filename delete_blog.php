<?php
include "connection.php";
$id = $_GET['id'];
$con = new Connection('new1');
$delete = $con->deleteBlog($id);
header('location:home.php');
