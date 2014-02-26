
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
    
         echo '
          <form action ="updatelogic.php?id='.$id.'&loc='.$results['PictureLocation'].'" id="inform" method="post" class="form-inline" enctype="multipart/form-data">
          <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" value="'.$results['HeadlineText'].'" name ="HeadlineText" required="required" maxlength="50"/></div> 
          </div>
          </br>
          <div class="row-fluid">
           <div class="span2 offset5"><input type ="text" class="form-control" value="'.$results['ButtonLink'].'" name ="ButtonLink" required="required" maxlength="300"/></div> 
          </div>
          </br>
          <div class="row-fluid">
          <div class="span2 offset5"><input type ="text" class="form-control" value = "'.$results['ButtonText'].'" name ="ButtonText" required="required" maxlength="15"/></div> 
             </div>
          </br>
          <div class="row-fluid">
          <div class="span2 offset5"><textarea rows="5" cols="30" class="form-control" name ="SubText" required="required" maxlength="250"/>'.$results['SubText'].'</textarea></div>
          </div>
          </br>
          <div class="row-fluid">
         <div class="span2 offset5">Current image is <img src="img/'.$results['PictureLocation'].'" alt ="carousel_img", width="100" height="50"></div>
         </div>
          </br>
          <div class="row-fluid">

         <div class="span5 offset5">Pick a new to replace image if desired. Must be 2000x967 pixels.</div>
       
          
          </div>
          
          <div class="row-fluid">

       <div class="span2 offset5"><input type="file" class="form-control" data-classButton="btn btn-primary" data-buttonText="Choose a File to Import" name="File" id="File" /></div>
        </div>
          </br>
          <div class="row-fluid">';
          if($results['Active']) {
               echo '<div class="span2 offset5"><input type="checkbox" name="Active" checked> Set carousel entry active?</div>';
             }
             else {
              echo '<div class="span2 offset5"><input type="checkbox" name="Active"> Set carousel entry active?</div>';
             }
            
             echo '</div>
          </br>
          <div class="row-fluid">
        <div class="span2 offset5"><button type="submit" class="btn btn-primary" data-dismiss="modal">Update Carousel Entry</button></div> 
        </div>
       </form>' 
     ;

     ?>


</body></html>