 b<?PHP
	session_start();
 if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
else {
	header("location:" . $_SERVER['HTTP_REFERER']);

 require('connect.php');

$id = $_POST['ID'];
$uname = $_POST['Uname'];
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];




 $query = 'insert INTO UserAccounts (id, Uname, Fname, Lname, Pass, Active) values('.$id.', "'.$uname.'", "'.$fname.'", "'.$lname.'", "'.sha1($id).'", 0)';
 $query3 = 'Insert into AccountLevel values('.$id.', 1, 0, 0, 0)';
 mysql_query($query, $link);

mysql_query($query3, $link);

}


?>