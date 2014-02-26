<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LabTrack</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<style type="text/css">
.table td {
	text-align: center;
}

.table th {
	text-align: center;
}
</style>
<?PHP
	include 'files.php';
?>
<link href="dist/css/DT_bootstrap.css" rel="stylesheet">
</head>

<body>
<?PHP 
	require 'nav.php'; 
?>

<?PHP
	require 'breadcrumbs.php';
?>
<?PHP
	include "connect.php";
	$currentID =$_SESSION['ID'];
	$query = "Select Fname, Lname, BSUEmail FROM capstoneusers where id = $currentID";
	$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Firstname = $results["Fname"];
			$Lastname = $results["Lname"];
			$Username = $results["BSUEmail"];
					
		}
	mysql_free_result($data);
	
	$query = "SELECT Administrator, Instructor, LabAssistant, Student FROM accountlevel WHERE Userid = $currentID";
	$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Administrator = $results["Administrator"];
			$Instructor = $results["Instructor"];
			$LabAssistant = $results["LabAssistant"];
			$Student = $results["Student"];			
		}
		
		mysql_free_result($data);		
?>

<div class="row-fluid">
  <div class="span4 offset2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Account Detail </h3>
      </div>
      <div class="panel-body">
        <h5>First Name</h5><h4><?PHP echo ucfirst($Firstname);  ?></h4>
        <hr />
        <h5>Last Name</h5><h4><?PHP echo ucfirst($Lastname);  ?></h4>
        <hr/>
        <h5>Username</h5><h4><?PHP echo str_replace("@bsu.edu", "", $Username);	?></h4>
        <hr />
        <h5><a href="#">Change Password </a></h5>
      </div>
    </div>
  </div>
  <!-- /.span8offset2 --> 
  <div class="span4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-eye-open"></span> Privileges</h3>
      </div>
      <div class="panel-body">
       <?PHP 
		/* If else block to place correct glyphicon next to Account Level */
		if($Administrator == 1) 
		{
			$Administrator = "ok";
		}
		else
		{
			$Administrator = "remove";
		}
		
		if($Instructor == 1) 
		{
			$Instructor = "ok";
		}
		else
		{
			$Instructor = "remove";
		}		
		
		if($LabAssistant == 1) 
		{
			$LabAssistant = "ok";
		}
		else
		{
			$LabAssistant = "remove";
		}		
		
		if($Student == 1) 
		{
			$Student = "ok";
		}
		else
		{
			$Student = "remove";
		}	     
	   ?>
       	  	
            
        <h4><span class="glyphicon glyphicon-<?PHP echo $Student;?>"></span> Student</h4>
        <hr />
        <h4><span class="glyphicon glyphicon-<?PHP echo $LabAssistant;?>"></span> Lab Assistant</h4>
        <hr />
        <h4><span class="glyphicon glyphicon-<?PHP echo $Instructor;?>"></span> Instructor</h4>
        <hr />
        <h4><span class="glyphicon glyphicon-<?PHP echo $Administrator;?>"></span> Administrator</h4>
        <hr />
		<?PHP
		if($Administrator == "remove"){
			echo"
        <h5> <a href='#'>Request Privilege Level</a> </h5>
				";
		}
		?>
      </div>
    </div>
    <!-- /.Panel -->
  </div>
 <!-- /.span4offset6 -->
</div>
<!-- /.row -->


<?PHP
if ($Student == "ok"){
echo "	
<div class='row-fluid'>
  <div class='span8 offset2'>
  		<div class='panel panel-primary'>
  		<div class='panel-heading'>Enrolled Classes</div>
		<div class='panel-body'>
		<div class='span12'>
        <!-- table -->
		<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>Course Name</th> <th>Section Number</th> <th>Room Number</th> <th>Instructor Name</th>
           		</tr>
            </thead>
            <tbody>
	 ";
		$query = "SELECT courses.name, courses.section, courses.Room, capstoneusers.Fname, capstoneusers.Lname FROM capstoneusers,usercourses,courses WHERE UserID = $currentID and InstructorID = capstoneusers.id and usercourses.CourseID = courses.CourseID";
		$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Coursename = $results["name"];
			$Sectionnumber = $results["section"];
			$Room = $results["Room"];
			$Instructorfirstname = $results["Fname"];
			$Instructorlastname = $results["Lname"];
			$Instructorname = $Instructorfirstname." ".$Instructorlastname;
						
			echo "<tr> <td>$Coursename</td> <td>$Sectionnumber</td> <td>$Room</td> <td>$Instructorname</td> </tr>";
		}
		
		echo "

        </tbody>  	
  		</table>
   		</div>
        </div>
        </div>
        </div>
        <!-- /.Panel -->
	</div>
  <!-- /.span8offset2 --> 
</div>
<!-- /.row -->
		
				";	
	}
		?>
<?PHP

if($Instructor == "ok"){
	
echo "	
<div class='row-fluid'>
  <div class='span8 offset2'>
  		<div class='panel panel-primary'>
  		<div class='panel-heading'>My Classes</div>
		<div class='panel-body'>
		<div class='span12'>
        <!-- table -->
		<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>Course Name</th> <th>Section Number</th> <th>Room Number</th> <th>Instructor Name</th>
           		</tr>
            </thead>
            <tbody>
	 ";
		$query = "SELECT courses.name, courses.section, courses.Room, capstoneusers.Fname, capstoneusers.Lname FROM capstoneusers, courses WHERE courses.InstructorID = $currentID and id = InstructorID";
		$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Coursename = $results["name"];
			$Sectionnumber = $results["section"];
			$Room = $results["Room"];
			$Instructorfirstname = $results["Fname"];
			$Instructorlastname = $results["Lname"];
			$Instructorname = $Instructorfirstname." ".$Instructorlastname;
						
			echo "<tr> <td>$Coursename</td> <td>$Sectionnumber</td> <td>$Room</td> <td>$Instructorname</td> </tr>";	
		}

       echo "
	    </tbody>  	
  		</table>
   		</div>
        </div>
        </div>
        </div>
        <!-- /.Panel -->
	</div>
  <!-- /.span8offset2 --> 
</div>
<!-- /.row -->
			";

}
?>

<?PHP

if($Instructor == "ok"){
	
echo "	
<div class='row-fluid'>
  <div class='span8 offset2'>
  		<div class='panel panel-primary'>
  		<div class='panel-heading'>My Students</div>
		<div class='panel-body'>
		<div class='span12'>
        <!-- table -->
		<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='MyStudents'>
        	<thead>
            	<tr>
            	<th>Student Name</th> <th>Course Name</th> <th>Section Number</th> <th>Room Number</th>
           		</tr>
            </thead>
            <tbody>
	 ";
		$query = "Select Fname, Lname, name, section, Room, Active from capstoneusers,usercourses, courses where usercourses.CourseID = courses.CourseID and id = UserID and InstructorID = $currentID;";
		$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Coursename = $results["name"];
			$Sectionnumber = $results["section"];
			$Room = $results["Room"];
			$Activestudent = $results['Active'];
			$Studentfirstname = $results["Fname"];
			$Studentlastname = $results["Lname"];
			$Studentname = $Studentfirstname." ".$Studentlastname;
			if ($Activestudent == '1'){
				$Activestudent = "<span class='glyphicon glyphicon-star-empty' id='ActiveToolTip' data-toggle='tooltip' data-placement='right' title='Active In Lab'></span>";
			}
			else{
				$Activestudent ="";
			}
			echo "<tr> <td>$Studentname $Activestudent</td> <td>$Coursename</td> <td>$Sectionnumber</td> <td>$Room</td> </tr>";	
		}

       echo "
	    </tbody>  	
  		</table>
   		</div>
        </div>
        </div>
        </div>
        <!-- /.Panel -->
	</div>
  <!-- /.span8offset2 --> 
</div>
<!-- /.row -->
			";

}
?>

<div class="row-fluid">
  <div class="span8 offset2">
    <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>2013 Ball State University 2000 W. University Ave. Muncie, IN 47306· <a href="http://www.bsu.edu">bsu.edu</a></p>
    </footer>
  </div>
  <!-- /.span8offset2 --> 
</div>
<!-- /.row --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script src="dist/js/jquery-2.0.3.js"></script> 
<script src="dist/js/bootstrap.js"></script> 
<script src="dist/js/holder.js"></script>
<script src="dist/js/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script src="dist/js/dataTables.tableTools.js"></script>
<script src="dist/js/DT_bootstrap.js"></script>
<script type="text/javascript">
$('#ActiveToolTip').tooltip()

</script>
</body>
</html>
