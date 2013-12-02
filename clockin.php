<?php
echo "<!DOCTYPE html>
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

       <script>
  var datetime = null,
        date = null;

var update = function () {
    date = moment(new Date())
    currentTime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
};

$(document).ready(function(){
    currentTime = $('#currentTime');
    update();
    setInterval(update, 1000);
  });
  </script>


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
        <input type='text' class='form-control' placeholder='Password' >
      </div>
      <button type='submit' class='btn btn-default'>Login</button>
    </form>
  </div>
  <!-- navbar end --> 
</nav>
";

session_start();
$_SESSION['userID'] = 1; //Code for testing before log in is added
if(isset($_SESSION['userID'])){
  $userId = $_SESSION['userID']; 


$host="tcp:hrlserver12.dhcp.bsu.edu,1433"; // Host name 

$connectionInfo = array( "UID"=>"my_DBuser","PWD"=>"Password1", "Database"=>"my_DB");

$link = sqlsrv_connect( $host, $connectionInfo);
if(!$link) {
  ('Something went wrong while connecting to MSSQL');
}


$query = "Select * from UsersCourses where UserID=".$userId;
$data = sqlsrv_query($link, $query);

  echo "<div class='row-fluid'>
    <div class='span4 offset4' style='text-align:center'>
      <div class='page-header'>
        <h1 id='currentTime'></h1>
        </br><small>Select class to clock in:</small>
      </div>
    <div class='row-fluid'>
      <div class='span' style='text-align:center'>
      <form action='clockinlogic.php' method='post' class='vertical-form'>
        <div class='form-group'>
        <select name='course' class='form-control'>";
       while($results = sqlsrv_fetch_array( $data)) {
          echo "<option>".$results['CourseID']. " Section ". $results['section'] . "</option>";
        }
        echo "</select>
        </div>
        <div class='form-group'>
       <button type='submit' class='btn btn-primary btn-lg'>Clock In</a>
       </div>
       </form>
  </div></div></div></div>";
 
}
else
{
  echo "Not logged in, cannot clock in";
}

echo "</body></html>";
?>