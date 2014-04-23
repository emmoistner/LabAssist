
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
   <title>Import Confirm</title>

 </head>
 <body>
<?php
 require ('nav.php');
 require ('includeJS.php');
 require ('files.php');
 require ('connect.php');

$name = mysql_real_escape_string($_POST['classname']);
$section = mysql_real_escape_string($_POST['section']);
$instructor = mysql_real_escape_string($_SESSION['ID']);
$room = mysql_real_escape_string($_POST['roomnum']);
$semester = mysql_real_escape_string($_POST['sem']);

$sql = "INSERT INTO Courses (CourseID, Name, Section, InstructorID, Room, Semester) Values (NULL, 'TCMP". $name ."', '". $section ."', '". $instructor ."', '". $room ."', '". $semester ."' )";

$query = mysql_query($sql);


?>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
<script src="dist/js/Jeditable/jquery.jeditable.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.editable.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>




<div class = "alert alert-info">Class Created!  Please return to "Edit Classes" to add students to this class.</div>

 
</body>

</html>