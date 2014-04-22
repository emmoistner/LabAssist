<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>

    <?PHP
  require('files.php');
  require ('includeJS.php');
  require('nav.php');
  require('connect.php');
   if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}
  $courseID = $_GET['id'];
  ?>

<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
<script>
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>

   </head>
   <body>
   	<div class="container">
   		<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>Student Name</th><th>IP</th> <th>Class</th> <th>Section</th><th>Semester</th> <th>Time In</th><th>Time Out</th><th>Time in Lab</th>
           		</tr>
            </thead>
            <tbody>
   <?php
   
   $query= "Select Courses.Name, Courses.Section, Courses.Semester, TimeClock.UserID, TimeClock.TimeIn, TimeClock.TimeOut, TimeDiff(TimeClock.TimeOut, TimeClock.TimeIn) as TimeDiff, INET_NTOA(TimeClock.IP) as IP, UserAccounts.Fname, UserAccounts.Lname from
	Courses, TimeClock, UserAccounts where Courses.InstructorID=".$_SESSION['ID']." and Courses.CourseID=".$courseID." and TimeClock.CourseID=".$courseID." and UserAccounts.id = TimeClock.UserID";
	$data = mysql_query($query, $link);
	 while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {

	 	$timeIn = $results['TimeIn'];
	 	$dateTimeIn = DateTime::createFromFormat("Y-m-d H:i:s", $timeIn);
	 	$finalTimeIn = date_format($dateTimeIn, "l F j, Y g:i A");

	 	$timeOut = $results['TimeOut'];
	 	$dateTimeOut = DateTime::createFromFormat("Y-m-d H:i:s", $timeOut);
	 	$finalTimeOut = date_format($dateTimeOut, "l F j, Y g:i A");

	 	echo "<tr>
	 			<th>".$results['Fname'].' '.$results['Lname']."</th><th>".$results['IP']."</th><th>".$results['Name']."</th><th>".$results['Section']."</th><th>".$results['Semester']."</th><th>".$finalTimeIn."</th><th>".$finalTimeOut."</th><th>".$results['TimeDiff']."</th>
	 			</tr>";
	 }
   ?>

   </tbody>  	
  		</table>
  		</div>
</body></html>