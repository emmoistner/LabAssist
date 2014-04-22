
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



$query = "INSERT IGNORE INTO UserAccounts (id, Uname, Fname, Lname, Pass) SELECT StudentID, Username, FirstName, LastName, SHA1(StudentID) FROM temp";

mysql_query($query, $link);

$account = "INSERT IGNORE INTO AccountLevel (UserID, Student) SELECT StudentID, AccountLevel FROM temp";

mysql_query($account, $link);

$connect = "INSERT INTO UserCourses (UserID, CourseID) SELECT StudentID, CourseID FROM temp";

mysql_query($connect, $link);

$drop = "DROP TABLE temp";

mysql_query($drop, $link);






?>

<div class = "alert alert-success">Successfully Imported!</div>

</body>

</html>

