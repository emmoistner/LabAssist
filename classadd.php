<?PHP
	session_start();
 if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:editclasses.php");

 require('connect.php');

$id = $_POST['ID'];
$uname = $_POST['Uname'];
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$courseID = $_GET['courseid'];



 $query = 'insert INTO UserAccounts (id, Uname, Fname, Lname, Pass, Active) values('.$id.', "'.$uname.'", "'.$fname.'", "'.$lname.'", "'.sha1($id).'", 0)';
 $query3 = 'Insert into AccountLevel values('.$id.', 1, 0, 0, 0)';
 mysql_query($query, $link);

 $query2 = "Insert INTO UserCourses values(".$id.", ".$courseID.")";

 mysql_query($query2, $link);

mysql_query($query3, $link);

}


?>