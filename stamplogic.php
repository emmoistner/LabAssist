<?PHP
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:dashboard.php");
	require('connect.php');
	$id = $_GET['id'];
	$timein = $_POST['TimeIn'];
	$timeout = $_POST['TimeOut'];

	$ip = $_SERVER['REMOTE_ADDR'];




	$query= "Update TimeClock set TimeIn='".$timein."', TimeOut='".$timeout."' where StampID=".$id;

	mysql_query($query, $link);

	$query2 = "Insert into TimeClockOverride values(null, ".$id.", ".$_SESSION['ID'].", '".$ip."', CURRENT_TIMESTAMP)";


	mysql_query($query2, $link);

}
?>