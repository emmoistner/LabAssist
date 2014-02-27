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
            	<th>Student Name</th><th>IP</th> <th>Class</th> <th>Section</th> <th>Time In</th><th>Time Out</th><th>Time in Lab</th>
           		</tr>
            </thead>
            <tbody>
   <?php
   
   $query= "Select courses.courseId, courses.name, courses.section, timeclock.UserId, timeClock.TimeIn, timeClock.TimeOut, TimeDiff(timeClock.TimeOut, timeClock.TimeIn) as TimeDiff, timeClock.IP, capstoneusers.Fname, capstoneusers.Lname from
	courses, timeclock, capstoneusers where courses.InstructorId=".$_SESSION['ID']." and timeclock.courseId=courses.courseId and capstoneusers.Id = timeClock.userId";
	$data = mysql_query($query, $link);
	 while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {

	 	$timeIn = $results['TimeIn'];
	 	$dateTimeIn = DateTime::createFromFormat("Y-m-d H:i:s", $timeIn);
	 	$finalTimeIn = date_format($dateTimeIn, "l F j, Y g:i A");

	 	$timeOut = $results['TimeOut'];
	 	$dateTimeOut = DateTime::createFromFormat("Y-m-d H:i:s", $timeOut);
	 	$finalTimeOut = date_format($dateTimeOut, "l F j, Y g:i A");

	 	echo "<tr>
	 			<th>".$results['Fname'].' '.$results['Lname']."</th><th>".$results['IP']."</th><th>".$results['name']."</th><th>".$results['section']."</th><th>".$finalTimeIn."</th><th>".$finalTimeOut."</th><th>".$results['TimeDiff']."</th>
	 			</tr>";
	 }
   ?>

   </tbody>  	
  		</table>
  		</div>
</body></html>