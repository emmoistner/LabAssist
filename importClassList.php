
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
$instructor = mysql_real_escape_string($_POST['instructor']);
$room = mysql_real_escape_string($_POST['roomnum']);
$semester = mysql_real_escape_string($_POST['sem']);

$sql = "INSERT INTO Courses (CourseID, Name, Section, InstructorID, Room, Semester) Values (NULL, '". $name ."', '". $section ."', '". $instructor ."', '". $room ."', '". $semester ."' )";

$query = mysql_query($sql);

$lastInsert = mysql_insert_id();

$temp = "CREATE TABLE temp (LastName VARCHAR(40), FirstName VARCHAR(40), Username VARCHAR(40), StudentID VARCHAR(40), LastAccess VARCHAR(100), Availability VARCHAR(255))";

mysql_query($temp);
?>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
<script src="dist/js/Jeditable/jquery.jeditable.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.editable.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>

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


function fnClickAddRow(){
  $('#table').dataTable().fnAddData([
    "Last Name",
    "First Name",
    "Username",
    "Student ID"


    ]);


  $('#table').dataTable().makeEditable({

    sUpdateURL: "UpdateData.php"

  });



}

function fnClickDeleteRow(){
$('#table').dataTable().fnDeleteRow(0);





}






</script>
<div class= "container">
<div class="add_delete_toolbar" >
  <button id="btnAddNewRow" onclick="fnClickAddRow()">Add Student</button>
  <button id="btnDeleteRow" onclick="fnClickDeleteRow()">Delete Student</button>

</div>
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