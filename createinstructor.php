
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
    if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
}
    ?>

          <form action ="instructorlogic.php" id="inform" method="post" class="form-inline" enctype="multipart/form-data">
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "Instructor ID" name ="ID" required="required" maxlength="10"/></div>
            </div>
          </br>
            <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "BSU Username" name ="email" required="required" maxlength="24"/></div>
            </div>
          </br>
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "First name" name ="Fname" required="required" maxlength="32"/></div> 
            </div>
          </br>
             <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "Last Name" name ="Lname" required="required" maxlength="32"/></div> 
            </div>
            </br>
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "BSU profile url" name ="url" required="required" maxlength="200"/></div> 
            </div>
            </br>
            <div class="row-fluid">
         <div class="span2 offset5"><textarea rows="5" class="form-control" style="width: 278px" placeholder = "Quick Bio for instructor" name ="Bio" required="required" maxlength="300"/></textarea></div>
              </div>
            </br>
            <div class="row-fluid">
            <div class="span2 offset5">Select an image of the instructor. Must be 125x175 pixels.</div>
          </div>
          <div class="row-fluid">
       <div class="span2 offset5"><input type="file"  required="required" class="form-control" style="width: 278px" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="File" id="File" required="required"/></div>
          </div>
     
        </br>
  
        <div class="row-fluid">
          <div class="span2 offset5"><button type="submit" class="btn btn-primary" data-dismiss="modal">Create New Instructor</button></div>
        </div> 
      </div>
       </form> 

 


</body></html>