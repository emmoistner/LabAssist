
    

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

    $courseIDSql = "Select courseID from Courses where name ='" . $className . "' and section =" . $section;
    $courseIDResult = sqlsrv_query($link, $courseIDSql);
    $courseIDArray = sqlsrv_fetch_array($courseIDResult);
    $courseID = $courseIDArray['courseID'];
    $clockInSql = "Insert into TimeClock (UserID, IP, TimeIn, CourseID) values(". $userID. ", '".$ip. "', CURRENT_TIMESTAMP, ". $courseID . ")";
    sqlsrv_query($link, $clockInSql);
  }
}
else {
  header("location:index.php");
}
  ?>

