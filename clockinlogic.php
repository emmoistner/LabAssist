
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>

  <link href='dist/css/bootstrap-responsive.css' rel='stylesheet'>
    <link href='dist/css/bootstrap.css' rel='stylesheet'>
    <link href='dist/css/bootstrap-Override.css' rel='stylesheet'>    

  </head>

  <body>

      <script src='dist/js/jquery-2.0.3.js'></script>
       <script src='dist/js/bootstrap.js'></script>
       <script src='dist/js/moment.js'></script>
    

<?php
session_start();

if(isset($_SESSION['Fname'])){
  $courses = $_POST['courses'];
  foreach ($courses as $course) {
    echo $course;
  }


  }
else
  echo "Please log in";
  ?>

</body></html>