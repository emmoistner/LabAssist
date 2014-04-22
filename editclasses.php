<html>
<head>

<?php
require('files.php');
  require ('includeJS.php');
  require('nav.php');
  require('connect.php');
    if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
?>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
<script>
$(document).ready(function() {
    $('table').dataTable();
} );
</script>

</head>
<body>

<?php
$id = $_SESSION['ID'];
$query = "Select Name, CourseID, Section, Semester from Courses where InstructorID=". $id;
$response = mysql_query($query, $link);
while($results = mysql_fetch_array($response)) {
	echo '<div class="container"><div class="row-fluid"><h4 class="modal-title">'.$results['Name'].' Section '.$results['Section'].' '.$results['Semester'].'</h4></div>
	<div class="row-fluid">';
	$courseID = $results['CourseID'];
	$query2 = "Select UserCourses.UserID, UserAccounts.Uname, UserAccounts.Fname, UserAccounts.Lname from UserCourses, UserAccounts where UserCourses.CourseID=".$courseID." and UserAccounts.id = UserCourses.UserID";
	$response2 = mysql_query($query2, $link);
	echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>ID</th><th>Username</th> <th>First Name</th> <th>Last Name</th><th>Remove</th>
           		</tr>
            </thead>
            <tbody>";
            while($results2=mysql_fetch_array($response2)) {
            	echo "<tr>
	 			<th>".$results2['UserID'].'</th><th>'.$results2['Uname'].'</th><th> '.$results2['Fname']."</th><th>".$results2['Lname']."</th>"; echo '<th><a class="btn btn-danger" href="classdelete.php?courseid='.$courseID.'&userid='.$results2['UserID'].'">
            <span class="glyphicon glyphicon-remove"></span></a></th>
	 			</tr>';
            }
         
         echo '</tbody>  	
  		</table>
  		</div>
      </br>
  		<form action ="classadd.php?courseid='.$courseID.'" id="inform" method="post">
  		<table<tr><th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "Student ID" name ="ID" required="required"/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "Username" name ="Uname" required="required"/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "First Name" name ="Fname" required="required"/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "Last Name" name ="Lname" required="required"/></div></th>
  		<th><button type="submit" class="btn btn-primary" data-dismiss="modal">Add New Student</button></th></tr></div></form></div>
  		</br><hr/>';
}


?>



</body>
</html>