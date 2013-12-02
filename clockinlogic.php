<?php
$course = $_POST["course"];

session_start();
if(isset($_SESSION['userID'])){
  $userId = $_SESSION['userId']; 


echo"<!DOCTYPE html>
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
    <!-- NAVBAR -->
<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
    <a class='navbar-brand' href='#'>LabTrack</a> </div>
  
  <!-- Group the nav links, forms, and other content for width toggling -->
  <div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
      <li class='active'><a href='#'>Home</a></li>
    </ul>
    </li>
    </ul>
    <form class='navbar-form navbar-right' role='Login'>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Username'>
      </div>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Password'>
      </div>
      <button type='submit' class='btn btn-default'>Login</button>
    </form>
  </div>
  <!-- navbar end --> 
</nav>
";

echo $course;
}
else (
echo "please log in";
  )
echo "</body></html>";
?>