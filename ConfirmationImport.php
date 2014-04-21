
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

$result = mysqli_query(link, $temp);

$query = "INSERT INTO UserAccounts (id, Uname, Fname, Lname, Pass) SELECT StudentID, Username, FirstName, LastName, StudentID FROM temp ON DUPLICATE KEY UPDATE UserAccounts.id = temp.StudentID, UserAccounts.Uname = temp.Username, UserAccounts.Fname = temp.FirstName, UserAccounts.Lname = temp.LastName, UserAccounts.Pass = temp.StudentID";

mysqli_query(link, $query);

$connect = "INSERT INTO UserCourses (UserID, CourseID) SELECT StudentID, CourseID FROM temp";

mysqli_query(link, $connect);

$drop = "DROP TABLE temp";

mysqli_query(link, $drop);






?>

<div class = "alert alert-success">Successfully Imported!</div>

</body>

</html>

