<?php
include "connection.php";
$con = new Connection('new1');
$con->deleteAllBlog();
header('location:home.php');
