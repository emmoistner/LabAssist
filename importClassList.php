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

 $name = mysql_real_escape_string($_POST['classname']);
 $section = mysql_real_escape_string($_POST['section']);
 $instructor = mysql_real_escape_string($_POST['instructor']);
 $room = mysql_real_escape_string($_POST['roomnum']);

$sql = "INSERT INTO Courses (CourseID, name, section, InstructorID, Room) Values (NULL, '". $name ."', '". $section ."', '". $instructor ."', '". $room ."' )";

$query = mysql_query($sql);

$lastInsert = mysql_insert_id();


 $Fname = mysql_real_escape_string($_POST['Fname']);
 $Lname = mysql_real_escape_string($_POST['Lname']);
 $bsuUsername = mysql_real_escape_string($_POST['BSUemail']);
 $id= mysql_real_escape_string($_POST['UserID']);
 

$sql2 = "INSERT INTO CapstoneUsers (id, BSUEmail, Fname, Lname, Pass) Values ('". $id ."','". $bsuUsername ."', '". $Fname ."','". $Lname ."', 'Pass')";

$query2 = mysql_query($sql2);

$sql3 = "INSERT INTO UserCourses(CourseID, UserID) Values ('". $lastInsert ."', '". $id ."')";

$query3 = mysql_query($sql3);

?>

<body> 
  
   <div class = "alert alert-success">Class Created!</div>
</body>
</html>

