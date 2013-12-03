<?php

require('connect.php');


$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

/*$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = strtolower($myusername);*/
$E_mail = $myusername. "@bsu.edu";
//$mypassword = sha1($mypassword);
$sql="SELECT BSUEmail, Pass, Fname, Lname, ID FROM CapstoneUsers WHERE BSUEmail=? and Pass=?";
$params = array($E_mail, $mypassword);

$data = sqlsrv_query($link, $sql, $params, array("Scrollable"=>"buffered"));
if( $data === false){
	die( print_r(sqlsrv_errors(), true));
}

$count=sqlsrv_num_rows($data);



if($count==1){
	header("location:login_success.php");
	$row = sqlsrv_fetch_array($data, SQLSRV_FETCH_NUMERIC);
	session_start();
	$_SESSION['Fname'] = $row[2]; 
	$_SESSION['Lname'] = $row[3]; 
	//$_SESSION['PositionID'] = $row['PositionID'];
	$_SESSION['ID'] = $row[4];
/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login_success.php';
	sqlsrv_close($link);
	exit;
} else {}
?>
