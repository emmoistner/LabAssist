
    

<?php

session_start();
require('connect.php');


if(isset($_SESSION['Fname']) && isset($_POST['courses'])){
 header("location:index.php");

  $courses = $_POST['courses'];
  $_SESSION['active'] = true;


  $ip = $_SERVER['REMOTE_ADDR'];
  $userID = $_SESSION['ID'];



  foreach ($courses as $course) {
    $className = substr($course, 0, 7);
    $section = substr($course, 16);

    $courseIDSql = "Select CourseID from Courses where Name ='" . $className . "' and Section =" . $section;
    $courseIDResult = mysql_query($courseIDSql, $link);
    $courseIDArray = mysql_fetch_array($courseIDResult, MYSQL_ASSOC);
    $courseID = $courseIDArray['courseID'];
    $clockInSql = "Insert into TimeClock (UserID, IP, TimeIn, CourseID) values(". $userID. ", INET_ATON('".$ip. "'), CURRENT_TIMESTAMP, ". $courseID . ")";
    mysql_query($clockInSql, $link);
    $activeSql = "Update UserAccounts set Active =1 where id=" . $userID;
    mysql_query($activeSql, $link);
  }
}
else {
  header("location:index.php");
}
  ?>

