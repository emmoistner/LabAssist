<?PHP
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
}
else {
	header("location:editusers.php");
	require('connect.php');
	$id = $_GET['id'];

	$query= "Update UserAccounts set Pass='".sha1($id)."' where id=".$id;
	mysql_query($query, $link);

}
?>