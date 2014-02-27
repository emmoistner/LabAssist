
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


$insert = "INSERT INTO CapstoneUsers (id, BSUEmail, FName, LName, Pass) SELECT StudentID, Username, FirstName, LastName, StudentID FROM temp";

mysql_query($insert);

$connect = "INSERT INTO UserCourses (UserID, CourseID) SELECT StudentID, CourseID FROM temp";

mysql_query($connect);

$drop = "DROP TABLE temp";

mysql_query($drop);






?>

<div class = "alert alert-success">Successfully Imported!</div>

</body>

</html>

