<?PHP
session_start();
if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:editclasses.php");
	require('connect.php');
	$id = $_GET['courseid'];
	$name = $_POST['name'];
	$semester = $_POST['semester'];
	$section = $_POST['section'];



	$query= 'Update Courses set Name="'.$name.'", Section="'.$section.'", Semester="'.$semester.'" where CourseID='.$id;

	mysql_query($query, $link);




}
?>