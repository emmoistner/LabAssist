<?php

require ('includeJS.php');

?>

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
        <link href='dist/chosen_V1.0.0/chosen.css' rel='stylesheet'> 
    <link href='dist/chosen_V1.0.0/chosen.min.css' rel='stylesheet'> 
    <link href='dist/css/chosen-Override.css' re='stylesheet'>

  </head>

  <body>



  <script>
  var datetime = null,
        date = null;

var update = function () {
    date = moment(new Date())
    currentTime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
};



$(document).ready(function(){
    $('#course').chosen({height: '110%', width: '110%'});
    currentTime = $('#currentTime');
    update();
    setInterval(update, 1000);
  });
  </script>


    <?php
    require('nav.php');
    ?>

<?php
session_start();
if(isset($_SESSION['Fname']) && $_SESSION['active']){
  $userId = $_SESSION['ID']; 


require('connect.php');



  echo "<div class='row-fluid'>
    <div class='span4 offset4' style='text-align:center'>
      <div class='page-header'>
        <h1 id='currentTime'></h1>
      </div>
    <div class='row-fluid'>
      <div class='span' style='text-align:center'>
      <form action='clockoutlogic.php' method='post' class='vertical-form'>
        <div class='form-group'>
        <select data-placeholder='Choose classes to clock out of...' multiple id='course' name='courses[]'>";

        $query = "Select CourseID from TimeClock where UserID =" . $userId . " AND TimeOut IS NULL";
        $data = sqlsrv_query($link, $query);
        $enable = TRUE;
       while($results = sqlsrv_fetch_array( $data)) {
          $courseID = $results['CourseID'];
          $secondQuery = "select name, section from courses where courseID =" . $courseID;


          $returned = sqlsrv_query($link, $secondQuery);
          $answers = sqlsrv_fetch_array($returned);


              echo "<option>".$answers['name']. " Section ". $answers['section'] . "</option>";
 
        }
        echo "</select>
        </div>
        <div class='form-group'>
       <button type='submit' class='btn btn-primary btn-lg'>Clock Out</a>
       </div>
       </form>
  </div></div></div></div>";
 
}
else
{
  echo "Not logged in or not clocked into any class, cannot clock out";
}

echo "</body></html>";
?>