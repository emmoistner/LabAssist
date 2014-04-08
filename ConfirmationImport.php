
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
   <title>Import Confirm</title>

 </head>
 <body>
<?php
 require ('nav.php');
 require ('includeJS.php');
 require ('files.php');
 require ('connect.php');



$temp = "SELECT StudentID, Username, FirstName, LastName, StudentID FROM temp";

$result = mysql_query($temp);

while ($answers = mysql_fetch_array($result)){
	$query2 = 'INSERT INTO CapstoneUsers(id, BSUEmail, Fname, Lname, Password) VALUES (' .$answers["StudentID"]. ', "' .$answers["Username"]. '", "' .$answers["FirstName"]. '", "' .$answers["LastName"]. '", ' .$answers["StudentID"]. ')';

	mysql_query($query2);
}

mysql_query($insert);

$connect = "INSERT INTO UserCourses (UserID, CourseID) SELECT StudentID, CourseID FROM temp";

mysql_query($connect);

$drop = "DROP TABLE temp";

mysql_query($drop);






?>

<div class = "alert alert-success">Successfully Imported!</div>

</body>

</html>

