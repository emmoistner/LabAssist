<?PHP
require('connect.php');
session_start();
 if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:editclasses.php");
$courseID = $_GET['id'];

$counter=0;
foreach ($_POST as $key => $value) {
	if($counter>0) {

		$counter++;
	}

	else {


 		$query = "Insert INTO UserCourses values(".$key.", ".$courseID.")";

 		mysql_query($query, $link);
 	}

	}
}
 
 ?>