
    

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
    $courseIDResult = mysql_query($courseIDSql, $link);
    $courseIDArray = mysql_fetch_array($courseIDResult, MYSQL_ASSOC);
    $courseID = $courseIDArray['courseID'];
    $clockOutSql = "Update TimeClock set TimeOut=CURRENT_TIMESTAMP where UserID=". $userID ." and CourseID=" . $courseID . " and TimeOut IS NULL";
    mysql_query($clockOutSql, $link);
   
  }
  
   $activeSql= "Select * from TimeClock where UserID=".$userID." and TimeOut IS NULL";
    $activeResult = mysql_query($activeSql, $link);
    $activeArray = mysql_fetch_array($activeResult, MYSQL_ASSOC);
    if(!$activeArray) {
      $_SESSION['active'] = FALSE;
      $deactiveSql = "Update CapstoneUsers set active=0 where ID=" . $userID;
      mysql_query($deactiveSql, $link);
    }

}
else {
  header("location:index.php");
}
  ?>

