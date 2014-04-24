<?PHP
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
}
else {
	header("location:editusers.php");
	require('connect.php');
	$id = $_GET['id'];
	$uname = $_POST['Uname'];
	$lname = $_POST['Lname'];
	$fname = $_POST['Fname'];
	$active = $_POST['Active'];


	$query= 'Update UserAccounts set Uname="'.$uname.'", Fname="'.$fname.'", Lname="'.$lname.'" where id='.$id;

	mysql_query($query, $link);

	$query2 = "";

	if(isSet($active)) {
		$query2 = "Update AccountLevel set Administrator = 1 where UserID=".$id;

	}
	else {
		$query2 = "Update AccountLevel set Administrator = 0 where UserID=".$id;
	}

	mysql_query($query2);

}
?>