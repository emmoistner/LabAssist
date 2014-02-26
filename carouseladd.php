
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

          <form action ="addlogic.php" id="inform" method="post" class="form-inline" enctype="multipart/form-data">
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "Header Text" name ="HeadlineText" required="required" maxlength="50"/></div>
            </div>
          </br>
            <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "URL" name ="ButtonLink" required="required" maxlength="300"/></div>
            </div>
          </br>
            <div class="row-fluid">
         <div class="span2 offset5"><input type ="text" class="form-control" placeholder = "Button Text" name ="ButtonText" required="required" maxlength="15"/><div> 
            </div>
          </br>
            <div class="row-fluid">
         <div class="span2"><textarea rows="5" class="form-control" style="width: 278px" placeholder = "Content under header. Max length 250 characters..." name ="SubText" required="required" maxlength="250"/></textarea></div>
              </div>
            </br>
            <div class="row-fluid">
            <p>Select an image for the banner. Must be 2000x967 pixels.</p>
       <div class="span2"><input type="file"  required="required" class="form-control" style="width: 278px" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="File" id="File" required="required"/></div>
          </div>
        </br>
            <div class="row-fluid">
               <div class="span8 offset1"><input type="checkbox" name="Active" checked> Set carousel entry active?</div>
               </div>
        </br>
  
        <div class="row-fluid">
          <div class="span2 offset2"><button type="submit" class="btn btn-primary" data-dismiss="modal">Create Carousel Entry</button></div>
        </div> 
      </div>
       </form> 

 


</body></html>