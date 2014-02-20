<?php

require('connect.php');


$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

/*$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = strtolower($myusername);*/
$E_mail = $myusername. "@bsu.edu";
//$mypassword = sha1($mypassword);
$sql="Select BSUEmail, Pass, Fname, Lname, ID, Active FROM CapstoneUsers WHERE BSUEmail='". $E_mail ."' and Pass='". $mypassword . "'";

$data = mysql_query($sql, $link);
if( $data === false){
	die( print_r(mysql_error(), true));
}

$count=mysql_num_rows($data);



if($count==1){
	header("location:login_success.php");
	$row = mysql_fetch_array($data);
	session_start();
	$_SESSION['Fname'] = $row[2]; 
	$_SESSION['Lname'] = $row[3]; 
	//$_SESSION['PositionID'] = $row['PositionID'];
	$_SESSION['ID'] = $row[4];
	$_SESSION['active'] = $row[5];
/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login_success.php';
	mysql_close($link);
	exit;
} else {}
?>
