
    

<?php
session_start();

require('connect.php');


if(isset($_SESSION['Fname']) && isset($_POST['courses']) && $_SESSION['active']){
  header("location:index.php");

  $courses = $_POST['courses'];

  $userID = $_SESSION['ID'];



  foreach ($courses as $course) {
    $className = substr($course, 0, 7);
    $section = substr($course, 16);

    $courseIDSql = "Select courseID from Courses where name ='" . $className . "' and section =" . $section;
    $courseIDResult = sqlsrv_query($link, $courseIDSql);
    $courseIDArray = sqlsrv_fetch_array($courseIDResult);
    $courseID = $courseIDArray['courseID'];
    $clockOutSql = "Update TimeClock set TimeOut=CURRENT_TIMESTAMP where UserID=". $userID ." and CourseID=" . $courseID . " and TimeOut IS NULL";
    sqlsrv_query($link, $clockOutSql);
   
  }
  
   $activeSql= "Select * from TimeClock where UserID=".$userID." and TimeOut IS NULL";
    $activeResult = sqlsrv_query($link, $activeSql);
    $activeArray = sqlsrv_fetch_array($activeResult);
    if(!$activeArray) {
      $_SESSION['active'] = FALSE;
      $deactiveSql = "Update CapstoneUsers set active=0 where ID=" . $userID;
      sqlsrv_query($link, $deactiveSql);
    }

}
else {
  header("location:index.php");
}
  ?>

