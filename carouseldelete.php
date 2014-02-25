<?php
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
} else {
header("location:carousel.php");
require('connect.php');
$id = $_GET['id'];

$query="Delete From Carousel Where Id=".$id;
mysql_query($query, $link);
}



?>