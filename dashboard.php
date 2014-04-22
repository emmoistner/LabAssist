<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LabTrack - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<?PHP
	include 'files.php';
	?>
</head>

<body>
<?PHP 
	require 'nav.php'; 
?>
<?PHP
	require 'breadcrumbs.php';
	include "connect.php";
	$currentID = $_SESSION['ID'];
	$queryAccountLevel = "SELECT Administrator, Instructor, LabAssistant, Student FROM AccountLevel WHERE Userid = $currentID";
	$dataAccountLevel = mysql_query($queryAccountLevel, $link);
		while($resultsLevel = mysql_fetch_assoc($dataAccountLevel)) 
		{
			$Administrator = $resultsLevel["Administrator"];
			$Instructor = $resultsLevel["Instructor"];
			$LabAssistant = $resultsLevel["LabAssistant"];
			$Student = $resultsLevel["Student"];			
		}
		
		mysql_free_result($dataAccountLevel);		
?>
<div class="row-fluid">
  <div class="span4 offset2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span> My Classes </h3>
      </div>
      <div class="panel-body">
        <?PHP
		$query = "SELECT Courses.name, Courses.section FROM UserAccounts,UserCourses,Courses WHERE UserID = $currentID and InstructorID = UserAccounts.id and UserCourses.CourseID = Courses.CourseID";
		$data = mysql_query($query, $link);
		while($results = mysql_fetch_assoc($data)) 
		{
			$Coursename = $results["name"];
			$Sectionnumber = $results["section"];
			echo "<h5> $Coursename"." "."$Sectionnumber </h5>";
		}
		
		?>
      </div>
    </div>
  </div>
  <?PHP
  if ($Instructor == 1){
  echo "
  <div class='span4'>
    <div class='panel panel-primary'>
      <div class='panel-heading'>
        <h3 class='panel-title'><span class='glyphicon glyphicon-pencil'></span> Class Editing </h3>
      </div>
      <div class='panel-body'>
        <h4><a href='Import.php'>Add Class</a></h4>
        <h4><a href='editclasses.php'>Edit Classes</a></h4>
        <h4><a href='editstudenttimes.php'>Correct Student Times</a></h4>
      </div>
    </div>
  </div>
  ";}
  ?>
</div>
<?PHP
if ($Administrator == 1 ){
echo "
<div class='row-fluid'>
  <div class='span4 offset2'>
    <div class='panel panel-primary'>
      <div class='panel-heading'>
        <h3 class='panel-title'><span class='glyphicon glyphicon-wrench'></span> Admin Tools </h3>
      </div>
      <div class='panel-body'>
        <h5><a href='carousel.php'>Banner Customization</a></h5>
        <h5><a href='editusers.php'>Edit/Add Users</a></h5>
      </div>
    </div>
  </div>
  <!-- /.span4 offset 2 --> 
</div>
<!-- /.row -->
";}
?>
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
<script src="dist/js/jquery-2.0.3.js"></script> 
<script src="dist/js/bootstrap.js"></script> 
<script src="dist/js/holder.js"></script>
</body>
</html>
