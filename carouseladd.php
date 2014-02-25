
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
          <div align="center">
          <form action ="addlogic.php" id="inform" method="post" class="form-inline" enctype="multipart/form-data">
         <input type ="text" class="input-small" placeholder = "Header Text" name ="HeadlineText" required="required" maxlength="50"/> 
          </br>
          </br>
          <input type ="text" class="input-small" placeholder = "URL" name ="ButtonLink" required="required" maxlength="300"/> 
          </br>
          </br>
         <input type ="text" class="input-small" placeholder = "Button Text" name ="ButtonText" required="required" maxlength="15"/> 
         </br>
         </br> 
         <textarea rows="5" cols="30" placeholder = "Content under header. Max length 250 characters..." name ="SubText" required="required" maxlength="250"/></textarea>
         </br>
         </br> 
         <p>Select an image for the carousel. Must be 2000x967 pixels</p>
       <input type="file"  required="required" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="File" id="File" required="required"/> 
        </br>
               <input type="checkbox" default="true" name="Active" checked> Set carousel entry active?
             </br>
           </br>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Create Carousel Entry</button> 
       </form> 
     </div>


</body></html>