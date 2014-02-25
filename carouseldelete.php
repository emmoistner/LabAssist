<?php
header("location:carousel.php");
require('connect.php');
$id = $_GET['id'];

$query="Delete From Carousel Where Id=".$id;
mysql_query($query, $link);




?>