<?php

require('connect.php');


$myusername=$_POST['username']; 
$mypassword=sha1($_POST['password']); 

/*$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = strtolower($myusername);*/
$username = $myusername;
//$mypassword = sha1($mypassword);
$sql="Select Uname, Pass, Fname, Lname, id, Active FROM UserAccounts WHERE Uname='". $username ."' and Pass='". $mypassword . "'";

$data = mysql_query($sql, $link);
if( $data === false){
	die( print_r(mysql_error(), true));
}

$count=mysql_num_rows($data);



if($count==1){
	header("location:login_success.php");
	$row = mysql_fetch_array($data);
	session_start();
	$_SESSION['Uname'] = $row[0];
	$_SESSION['Fname'] = $row[2]; 
	$_SESSION['Lname'] = $row[3]; 
	$_SESSION['ID'] = $row[4];
	$id = $row[4];
	$_SESSION['active'] = $row[5];

	$sql2 = "Select Student, Instructor, LabAssistant, Administrator from AccountLevel where UserID=".$id;
	$data2 = mysql_query($sql2, $link);
	$results=mysql_fetch_array($data2, MYSQL_ASSOC);
	$_SESSION['Student'] = $results['Student'];
	$_SESSION['Instructor'] = $results['Instructor'];
	$_SESSION['LabAssistant'] = $results['LabAssistant'];
	$_SESSION['Administrator'] = $results['Administrator'];



/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login_success.php';
	

	mysql_close($link);
	exit;
} else {
	header("location:index.php");
}
?>
