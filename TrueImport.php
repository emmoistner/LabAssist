<!DOCTYPE html>
<html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Import Students</title>
   <link href="dist/css/bootstrap.css" rel="stylesheet">
   <style type="text/css">
   
   #wrap{
      margin: 80px auto;
      width: 960px;
      padding: 10px;
      overflow: hidden;
      background: #FAFAFA;
      border-radius: 4px;
      -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
    }
    
    table {
      max-width: 100%;
      background-color: #fff;
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      margin-bottom: 20px;
    }
    table th{
      background: #eae4ff;
    }
    table th,
    table td {
      padding: 8px;
      line-height: 20px;
      text-align: left;
      vertical-align: top;
      border-top: 1px solid #dddddd;
    }
    table {
      border: 1px solid #dddddd;
      border-collapse: separate;
      *border-collapse: collapse;
      border-left: 0;
      -webkit-border-radius: 4px;
         -moz-border-radius: 4px;
              border-radius: 4px;
    }
    table th,
    table td {
      border-left: 1px solid #dddddd;
    }

    table tr:nth-child(odd){
      background-color: #f9f9f9;
    }

    table tr:hover td
    {
      background-color: #f5f5f5;
    }

    table tr:first-child{
      font-weight: bold;
    }
    
     
   </style> 
 </head>
 
 <?php

 require ('nav.php');
 require ('includeJS.php');
 ?>

<?php


$con = mysql_connect('localhost', 'root', 'root');
  if (!$con)
  {
    die('Not connected : ' . mysql_error());
  }

  $db = mysql_select_db('LabTrack', $con);
if (!$db)
  {
    die ('Cannot find database : ' . mysql_error());
  }
 $name = mysql_real_escape_string($_POST['classname2']);
 $section = mysql_real_escape_string($_POST['section2']);
 $instructor = mysql_real_escape_string($_POST['instructor2']);
 $room = mysql_real_escape_string($_POST['roomnum2']);

$sql = "INSERT INTO Courses (CourseID, name, section, InstructorID, Room) Values (NULL, '". $name ."', '". $section ."', '". $instructor ."', '". $room ."' )";

$query = mysql_query($sql);

$lastInsert = mysql_insert_id();


$file = mysql_real_escape_string($_POST['the_file']);


$temp = "CREATE TABLE temp (LastName VARCHAR(40), FirstName VARCHAR(40), Username VARCHAR(40), StudentID VARCHAR(40), LastAccess VARCHAR(100), Availability VARCHAR(255))";

mysql_query($temp);

$sql2="LOAD DATA LOCAL INFILE '". $file ."'
    INTO TABLE `temp`
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '”' AND '\"'
    LINES TERMINATED BY '\\r\\n'
    
    ";

mysql_query($sql2);

$insert = "INSERT INTO CapstoneUsers (id, BSUEmail, FName, LName, Active) SELECT StudentID, Username, FirstName, LastName, Availability FROM temp";

mysql_query($insert);

//$connect = "INSERT INTO UserCourses (UserID, CourseID) VALUES (SELECT StudentID FROM temp, '". $lastInsert ."')";

//mysql_query($connect);

//$drop = "DROP TABLE temp";

//mysql_query($drop);









$sql3 = "INSERT INTO UserCourses(CourseID, UserID) Values ('". $lastInsert ."', '". $id ."')";

$query3 = mysql_query($sql3);


?>

<body> 
  
   <div class = "alert alert-success">Import Successful!</div>
</body>
</html>

