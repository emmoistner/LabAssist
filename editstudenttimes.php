<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LabTrack - Edit Student Times</title>
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
	$currentID = $_SESSION['ID'];
?>
<form method ="POST" action="editstudenttimestable.php">
<select class="form-control" onChange="this.form.submit()" name="id">

  		<option value = "-1"> </option>
       <?PHP
  		include 'connect.php';
		$list=mysql_query("Select Fname, Lname, id from UserAccounts, Courses, UserCourses where UserAccounts.id = UserCourses.UserID and Courses.CourseID = UserCourses.CourseID and Courses.InstructorID = $currentID");
		while ($row_list=mysql_fetch_assoc($list)){
			$nameFirst = $row_list['Fname'];
			$nameLast = $row_list['Lname'];
			$userID = $row_list['id'];
			$nameFull = $nameFirst." ".$nameLast;
		?>
  <option name = "id" id="id" value = "<?PHP echo $userID; ?>" > <?PHP echo $nameFull; ?> </option>
  <?PHP	}?>
</select>
</form>
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
<script type="text/javascript">
function LocChange(value){
	
	if (value == -1){
	}
	else{
		window.location.href = 'editstudenttimestable.php';
	}
}  

</script>
</body>
</html>