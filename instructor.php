<!DOCTYPE html>
<?php
	require "includeJS.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LabTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<link href='dist/css/bootstrap-responsive.css' rel='stylesheet'>
    <link href='dist/css/bootstrap.css' rel='stylesheet'>
    <link href='dist/css/bootstrap-Override.css' rel='stylesheet'>    
    <link href='dist/chosen_V1.0.0/chosen.css' rel='stylesheet'> 
    <link href='dist/chosen_V1.0.0/chosen.min.css' rel='stylesheet'> 
    <link href='dist/css/chosen-Override.css' re='stylesheet'>
	<script>
		$(document).ready(function(){
	    	$('#course').chosen({height: '110%', width: '110%'});
		});
	</script>
  </head>

  <body>



<?PHP
require "connect.php";
require "nav.php";

?>

<?php
if(isset($_SESSION['Fname'])){
  $userId = $_SESSION['ID']; 

if(!$link) {
  die('Something went wrong while connecting to MSSQL');
}

echo " <table class='table table-striped table-bordered'>
  	<thead>
		<tr>
			<th>Timestamp ID</th>
			<th>User ID</th>
			<th>IP Address</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Course ID</th>
		</tr>
	</thead>
	<tbody>";


$query = "Select StampID, UserID, IP, TimeIn, TimeOut, CourseID FROM TimeClock";
$data = mysql_query($query, $link);
while($results = mysql_fetch_array($data)) {
  $stampID = $results[0];
  $userID = $results[1];
  $ip = $results[2];
  $timeIn = $results[3];
  $timeOut = $results[4];
  $courseID = $results[5];
  echo "<tr><td>$stampID</td>";
  echo "<td>$userID</td>";
  echo "<td>$ip</td>";
  echo "<td>$timeIn</td>";
  echo "<td>$timeOut</td>";
  echo "<td>$courseID</td></tr>";


}

echo"</tbody></table>";


/*$query = "Select CourseID from UsersCourses";
$data = sqlsrv_query($link, $query);

  echo "<div class='row-fluid'>
    		<div class='span4 offset4' style='text-align:center'>     
				<div class='row-fluid'>
					<div class='span' style='text-align:center'>
						<form method='post' action='instuctorlogic.php' class='vertical-form'>
							<div class='form-group'>
								<select data-placeholder='Choose class to view' id='course' name='course'>";
  while($results = sqlsrv_fetch_array( $data)) {
  $courseID = $results['CourseID'];
  $secondQuery = "select name from courses where courseID =" . $courseID;
  $returned = sqlsrv_query($link, $secondQuery);
  $answers = sqlsrv_fetch_array($returned);
  
  echo "<option>".$answers['name']."</option>";
        }
  echo "</select>
        </div>
        <div class='form-group'>
			<button type='submit' class='btn btn-primary btn-lg'>View Hours</a>
		</div>
        </form>
  </div></div></div></div>
  <table class='table table-striped table-bordered'>
  	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Hours</th>
		</tr>
		<script>
			$.ajax({
				url: 'instructorlogic.php',
				type:'POST',
				dataType: 'json',
				success: function(output_string){
                	$('#result_table').append(output_string);
				} // End of success function of ajax form
			}); // End of ajax call    
		</script>
	</thead>
  </table>";*/
  
 
}
else
{
  echo "Not logged in, cannot clock in";
}

?>



