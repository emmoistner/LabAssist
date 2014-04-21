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

if(isset($_SESSION['Fname'])){
  $userId = $_SESSION['ID']; 

require('connect.php');



  echo "<div class='row-fluid'>
    <div class='span4 offset4' style='text-align:center'>
      <div class='page-header'>
        <h1 id='currentTime'></h1>
      </div>
    <div class='row-fluid'>
      <div class='span' style='text-align:center'>
      <form action='clockinlogic.php' method='post' class='vertical-form'>
        <div class='form-group'>
        <select data-placeholder='Choose classes to clock in for...' multiple id='course' name='courses[]'>";

        $query = "Select CourseID from UserCourses where UserID=" . $userId;
        $data = mysql_query($query, $link);
        $enable = TRUE;
       while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {
          $courseID = $results['CourseID'];
     
          $secondQuery = "Select Name, Section from Courses where CourseID =" . $courseID;


          $returned = mysql_query($secondQuery, $link);
          $answers = mysql_fetch_array($returned, MYSQL_ASSOC);







          $timeClockSql = "Select CourseID from TimeClock where UserID =" . $userId . " AND TimeOut IS NULL";
          $timeClockResults = mysql_query($timeClockSql, $link);
          while($timeClockArray = mysql_fetch_array($timeClockResults, MYSQL_ASSOC)) {


                if($timeClockArray['CourseID'] == $courseID) {
                    $enable = FALSE;
                    break;
            
                } 
                else 
                {
                    $enable = TRUE;
              
                }
             
          }
        




            if($enable) {
              echo "<option>".$answers['Name']. " Section ". $answers['Section'] . "</option>";
            }
            else {
              echo "<option disabled='true'>".$answers['Name']. " Section ". $answers['Section'] . "</option>";
            }
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