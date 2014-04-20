
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>

    <?PHP
  require('files.php');
  require ('includeJS.php');
  ?>



  <body>

    <?php
    require('nav.php');
    require('connect.php');
    require('files.php');
    
    if(!isset($_SESSION['Fname'])) {
  header("location:index.php");
}
    
         echo '
          <form action ="passwordlogic.php" id="inform" method="post" class="form-inline">
          <div class="row-fluid">
          <div class="span2 offset5"><input type ="password" class="form-control" placeholder="Current Password" id="CurrentPass" name ="CurrentPass" required="required" maxlength="255"/></div> 
          </div>
          </br>
          <div class="row-fluid">
           <div class="span2 offset5"><input type ="password" class="form-control" placeholder="New Password" id ="password" name ="password" maxlength="255"/></div> 
          </div>
          </br>
          <div class="row-fluid">
          <div class="span2 offset5"><input type ="password" class="form-control" placeholder="Repeat New Password" id="passwordSecond" name ="passwordSecond" maxlength="255"/></div> 
             </div>
          </br>
          <div class="row-fluid">
        <div class="span2 offset5"><button type="submit" class="btn btn-primary" data-dismiss="modal">Change Password</button></div> 
        </div>
       </form>' 
     ;

     ?>


</body
  </head>
  <script>
  
    $("#inform").validate({
  rules: {   
    password: "required",
    passwordSecond: {equalTo: "#password"}
  },
  messages: {
    passwordSecond: "Not equal to new password given."
  }
});
   </script>
></html>