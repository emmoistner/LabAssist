<html>
<head>

<?php
  require('files.php');
  require ('includeJS.php');
  require('nav.php');
  require('connect.php');
    if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
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
<title>LabTrack - Edit Users</title>
</head><body>
<div class="container">
<table cellpadding='0' cellspacing='0' border='0' class='table table-hover table-bordered' id='example'>
        	<thead>
            	<tr>
            	<th>ID</th><th>Username</th> <th>First Name</th> <th>Last Name</th><th>Edit User</th><th>Remove User</th>
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
	<th><a class="btn btn-default" href="changeuser.php?id='.$answer['id'].'">
            <span class="glyphicon glyphicon-pencil"></span></a></th>
	<th><a class="btn btn-danger" href="deleteuser.php?id='.$answer['id'].'">
            <span class="glyphicon glyphicon-remove"></span></a></th>

	</tr> ';
}


?>
</tbody></thead></table></br>
<form action ="useradd.php" id="inform" method="post">
  		<table<tr><th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "BSU ID" name ="ID" required/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "Username" name ="Uname" required/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "First Name" name ="Fname" required/></div></th>
      <th><div class="span2-offset5"><input type ="text" class="form-control" placeholder = "Last Name" name ="Lname" required/></div></th>
  		<th><button type="submit" class="btn btn-primary" data-dismiss="modal">Add New User</button></th></tr></div></form>
  		</div>

</body></html>