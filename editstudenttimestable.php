k<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>LabTrack</title>
<?PHP
  require('files.php');
  require ('includeJS.php');
  require('nav.php');
  require('connect.php');
  $currentID = $_SESSION['ID'];
   if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}

  ?>
<script src="dist/js/jquery-2.0.3.js"></script> 
<script src="dist/js/Jeditable/jquery.jeditable.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.editable.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
<script>
$(document).ready(function(){
     $('#table').dataTable({
      aoColumns: [
      {

        sName: "Fname"
      },
      {
        sName: "Lname"
      },

      {

        sName: "IP"
      },

      {
        sName: "Name"
      },

      {
        sName: "Section"
      },
      {
        sName: "Semester"
      },
      {
        sName: null
      },
      {
        sName: null
      },
      {
        sName: null
      }


      ]


     }).makeEditable({

      sUpdateURL: "UpdateESTT.php"

     });
});
</script>
<?PHP

	if (isset($_POST['id'])){
	
	$selecteStudent = $_POST['id'];
	
	}
?>
</head>
<body>
<div class="container">
<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='table'>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>IP</th>
      <th>Class</th>
      <th>Section</th>
      <th>Semester</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Time in Lab</th>
    </tr>
  </thead>
  <tbody>
  <?PHP 
  $query= "Select UserAccounts.id, Courses.Name, Courses.Section, Courses.Semester, TimeClock.UserID, TimeClock.TimeIn, TimeClock.TimeOut, TimeDiff(TimeClock.TimeOut, TimeClock.TimeIn) as TimeDiff, INET_NTOA(TimeClock.IP) as IP, UserAccounts.Fname, UserAccounts.Lname from UserAccounts, Courses, UserCourses, TimeClock where UserAccounts.id = TimeClock.UserID and UserAccounts.id = UserCourses.UserID and Courses.CourseID = UserCourses.CourseID and Courses.InstructorID = $currentID and UserAccounts.id = $selecteStudent";
	$data = mysql_query($query, $link);
	 while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {

	 	$timeIn = $results['TimeIn'];
	 	$dateTimeIn = DateTime::createFromFormat("Y-m-d H:i:s", $timeIn);
	 	$finalTimeIn = date_format($dateTimeIn, "l F j, Y g:i A");

	 	$timeOut = $results['TimeOut'];
	 	$dateTimeOut = DateTime::createFromFormat("Y-m-d H:i:s", $timeOut);
	 	$finalTimeOut = date_format($dateTimeOut, "l F j, Y g:i A");
	
		echo "<tr id = ";
    <?=$row['id']; ?>
    <?PHP
    echo ">
    
    
	 			<td>".$results['Fname']."</td><td>".$results['Lname']."</td><td>".$results['IP']."</td><td>".$results['Name']."</td><td>".$results['Section']."</td><td>".$results['Semester']."</td><td>".$finalTimeIn."</td><td>".$finalTimeOut."</td><td>".$results['TimeDiff']."</td>
	 			</tr>";
	
	
	}
  ?>
  
  
  </tbody>
</table>
<div class="row-fluid">
  <div class="span8 offset2">
    <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>2013 Ball State University 2000 W. University Ave. Muncie, IN 47306· <a href="http://www.bsu.edu">bsu.edu</a></p>
    </footer>
  </div>
  <!-- /.span4 --> 
</div>
<!-- /.row --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script src="dist/js/bootstrap.js"></script> 
<script src="dist/js/holder.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
