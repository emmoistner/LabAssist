
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>

    <?PHP
  require('files.php');
  require ('includeJS.php');
  require('connect.php');
  ?>

  </head>

  <body>

    <?php
    require('nav.php');
    if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
}

  $id= $_GET['id'];
    ?>

         <?PHP 

          $query = "Select * from UserAccounts where id =".$id;
          $response = mysql_query($query, $link);
          $results = mysql_fetch_array($response);

         echo '<form action ="changeuserlogic.php?id='.$id.'" id="inform" method="post" class="form-inline">
         
            <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "BSU Username" value="'.$results['Uname'].'" name ="Uname" required="required" maxlength="24"/></div>
            </div>
          </br>
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "First name" value="'.$results['Fname'].'" name ="Fname" required="required" maxlength="32"/></div> 
            </div>
          </br>
             <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "Last Name" value="'.$results['Lname'].'" name ="Lname" required="required" maxlength="32"/></div> 
            </div>
            </br>
        <div class="row-fluid">
          <div class="span2 offset5"><button type="submit" class="btn btn-primary" data-dismiss="modal">Commit Changes</button></div>
        </div> 
        </br>
        <div class="row-fluid">
          <div class="span2 offset5"><a class="btn btn-default" href="resetpassword.php?id='.$id.'">Reset User\'s Password</a></div>
        </div> 
      </div>
       </form>';

       ?>

 


</body></html>