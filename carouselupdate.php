
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
    if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
}

    $id = $_GET['id'];

      $query ='Select * from Carousel where Id =' . $id;
      $data = mysql_query($query, $link);
      $results = mysql_fetch_array($data, MYSQL_ASSOC);
    
         echo '<div align="center">
          <form action ="updatelogic.php?id='.$id.'&loc='.$results['PictureLocation'].'" id="inform" method="post" class="form-inline" enctype="multipart/form-data">
         <input type ="text" class="input-small" value="'.$results['HeadlineText'].'" name ="HeadlineText" required="required" maxlength="50"/> 
          </br>
          </br>
          <input type ="text" class="input-small" value="'.$results['ButtonLink'].'" name ="ButtonLink" required="required" maxlength="300"/> 
          </br>
          </br>
         <input type ="text" class="input-small" value = "'.$results['ButtonText'].'" name ="ButtonText" required="required" maxlength="15"/> 
         </br>
         </br> 
         <textarea rows="5" cols="30" name ="SubText" required="required" maxlength="250"/>'.$results['SubText'].'</textarea>
         </br>
         </br> 
         <p>Current image is <img src="img/'.$results['PictureLocation'].'" alt ="carousel_img", width="100" height="50"></p> <p>Pick a new to replace image if desired. Must be 2000x967 pixels</p>
       <input type="file" class="filestyle" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="File" id="File" /> 
        </br>
               <input type="checkbox" default="true" name="Active" checked> Set carousel entry active?
             </br>
           </br>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Update Carousel Entry</button> 
       </form> 
     </div>';

     ?>


</body></html>