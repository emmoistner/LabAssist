<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
   <title>Import Students</title>

 </head>
 <body>
 
 <?php

 require ('nav.php');
 require ('includeJS.php');
 require ('files.php');
 require ('connect.php');
 ?>

 <div class = "alert alert-info">Please make any changes to the fields you want and then click "Finish" below.</div>

<?php

 $name = mysql_real_escape_string($_POST['classname2']);
 $section = mysql_real_escape_string($_POST['section2']);
 $instructor = mysql_real_escape_string($_SESSION['ID']);
 $room = mysql_real_escape_string($_POST['roomnum2']);
 $semester = mysql_real_escape_string($_POST['sem2']);

$sql = "INSERT INTO Courses (CourseID, Name, Section, InstructorID, Room, Semester) Values (NULL, 'TCMP'+". $name ."', '". $section ."', '". $instructor ."', '". $room ."', '". $semester ."' )";

$query = mysql_query($sql);

$lastInsert = mysql_insert_id();


$file = mysql_real_escape_string($_POST['the_file']);


$temp = "CREATE TABLE temp (LastName VARCHAR(40), FirstName VARCHAR(40), Username VARCHAR(40), StudentID VARCHAR(40), LastAccess VARCHAR(100), Availability VARCHAR(255))";

mysql_query($temp);

$sql2="LOAD DATA LOCAL INFILE '". $file ."'
    INTO TABLE `temp`
    FIELDS TERMINATED BY ',' ENCLOSED BY '\"'
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES";
    
    

mysql_query($sql2);

$courseID = "ALTER TABLE temp ADD CourseID VARCHAR(60) AFTER Availability";

mysql_query($courseID);

$accountLvl = "ALTER TABLE temp ADD AccountLevel INTEGER(1) AFTER CourseID";

mysql_query($accountLvl);

$insertAccountlvl = "UPDATE temp SET AccountLevel= 1";

mysql_query($insertAccountlvl);

$insertCourseID = "UPDATE temp SET CourseID = ". $lastInsert ."";

mysql_query($insertCourseID);


?>
<script src="dist/js/Jeditable/jquery.jeditable.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.editable.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">


<script type = "text/javascript">
$(document).ready(function(){
     $('#table').dataTable({
      aoColumns: [
      {

        sName: "LastName"
      },

      {

        sName: "FirstName"
      },

      {
        sName: "Username"

      },

      {
        sName: "StudentID"
      }


      ]


     }).makeEditable({

      sUpdateURL: "UpdateData.php"

     });
});


</script>




<div class= "container">
   <table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='table'>
    <thead>
      <tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>User Name</th>
     <th>Student ID</th>
     
     
  </tr>
  </thead>
  <tbody>
<?php


$result = mysql_query("SELECT StudentID, Username, FirstName, LastName FROM temp");


while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    ?>

    
<tr id = <?=$row['StudentID']; ?>>
    <td><?=$row['LastName']; ?></td>
    <td><?=$row['FirstName']; ?></td>
    <td><?=$row['Username']; ?></td>
     <td><?=$row['StudentID']; ?></td>
  
     
</tr>    
<?php
}
?>
</tbody>
</table>
</div>
</br>
</br>
<form action ="ConfirmationImport.php" method="post">
<p align="right">
<button type = "submit" class="btn btn-sm btn-primary">Finish</button>
</p>
</form>
</body>




</html>

