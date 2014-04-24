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

$courseID = $_GET['id'];
?>


<title>LabTrack</title>
</head><body>
<div class="container">
  <form action ="existadd.php?id=<?PHP echo $courseID; ?>" id="inform" method="post">
<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>ID</th><th>Username</th> <th>First Name</th> <th>Last Name</th><th>Select User</th>
           		</tr>
            </thead>
            <tbody>
<?PHP

$query = "Select id, Uname, Fname, Lname from UserAccounts";
$response = mysql_query($query, $link);



while($answer = mysql_fetch_array($response)) {
	echo ' <tr>
	<th>'.$answer['id'].'</th>
	<th>'.$answer['Uname'].'</th>
	<th>'.$answer['Fname'].'</th>
	<th>'.$answer['Lname'].'</th>
	<th><input type="checkbox" name="'.$answer['id'].'">
             </th>
	

	</tr> ';
}


?>
</tbody></thead></table></br>
  		<button type="submit" class="btn btn-primary" data-dismiss="modal">Add Users to Class</button></div></form>
  		</div>

</body></html>