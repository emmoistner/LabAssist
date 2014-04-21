<?PHP
	session_start();
 if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:editclasses.php");

 require('connect.php');

$userID = $_GET['userid'];
$courseID = $_GET['courseid'];



 $query = 'delete from UserCourses where UserID='.$userID.' and CourseID=' .$courseID;
 mysql_query($query, $link);
}


?>