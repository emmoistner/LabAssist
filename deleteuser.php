<?php
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
} else {
header("location:editusers.php");
require('connect.php');
$id = $_GET['id'];

$query="Delete From UserCourses where UserID=".$id;
$query2="Delete from AccountLevel where UserID=".$id;
$query3="Delete from InstructorBio where ID=".$id;
$queryc= "Select StampID from TimeClock where UserID=".$id;
$response = mysql_query($queryc, $link);
while($results = mysql_fetch_array($response)) {
	$queryt = "Delete from TimeClockOverride where StampID =".$results['StampID'];
	mysql_query($queryt, $link);
}

$queryg="Delete from TimeClockOverride where UserID=".$id;
$query4="Delete From TimeClock where UserID=".$id;
$query5="Delete From UserAccounts Where id=".$id;

mysql_query($queryg, $link);
mysql_query($query, $link);
mysql_query($query2, $link);
mysql_query($query3, $link);
mysql_query($query4, $link);
mysql_query($query5, $link);
}



?>