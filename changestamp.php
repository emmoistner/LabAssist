
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>

    <?PHP
  require('files.php');
  require ('includeJS.php');
  ?>

  </head>

  <body>

    <?php
    require('nav.php');
    require('connect.php');
    if(!isset($_SESSION['Fname']) || $_SESSION['Instructor']==0) {
  header("location:index.php");
}

    $id = $_GET['id'];

      $query ='Select * from TimeClock where StampID =' . $id;
      $data = mysql_query($query, $link);
      $results = mysql_fetch_array($data, MYSQL_ASSOC);

         echo '
          <div class="row-fluid"><div class="span5 offset5">Please use the format yyyy-mm-dd hh:mm:ss and use a 24 hour clock for the hour.</div></div>
          <form action="stamplogic.php?id='.$id.'"" id="inform" method="post" class="form-inline">
          <div class="row-fluid"><div class="span2 offset5">Time In</div></div>
          <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" value="'.$results['TimeIn'].'" name ="TimeIn" pattern="\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2}" required="required" maxlength="50"/></div> 
          </div>
          </br>
          <div class="row-fluid"><div class="span2 offset5">Time Out</div></div>
          <div class="row-fluid">
           <div class="span2 offset5"><input type ="text" class="form-control" value="'.$results['TimeOut'].'" name ="TimeOut" pattern="\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2}" required="required" maxlength="300"/></div> 
          </div>
          </br>
         
          <div class="row-fluid">
        <div class="span2 offset5"><button type="submit" class="btn btn-primary">Update Timestamp</button></div> 
        </div>
       </form>' 
     ;

     ?>


</body></html>