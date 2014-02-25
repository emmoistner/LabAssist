
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>

    <?PHP
  require('includeJS.php');
  require('files.php');
  require('connect.php');
  require('nav.php');
  ?>

  </head>

  <body>

    <div class="container">
    <div class="row-fluid">
    <div class="span2">Carousel ID</div>
    <div class="span2">Headline Text</div>
    <div class="span2">Image</div>
    <div class="span2">Active</div>
    <div class="span2">Update</div>
    <div class="span2">Delete</div>
    </div>
  	<?PHP
      $query = 'Select * from Carousel';
      $data = mysql_query($query, $link);
      while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {
  	     echo '<div class="row-fluid">
          <div class="span2">'.$results['Id'].'</div>
          <div class="span2">'.$results['HeadlineText'].'</div>
          <div class="span2"><img src="img/'.$results['PictureLocation'].'" alt ="carousel_img", width="100" height="50"></div>';
          if($results['Active']) {
            echo '<div class="span2">Yes</div>';
          }
          else {
            echo '<div class="span2">No</div>';
          }

          echo '<div class="span2"><a class="btn btn-default" href="carouselupdate.php?id='.$results['Id'].'">
            <span class="glyphicon glyphicon-pencil"></span></a>
            </div>
            <div class="span2"><a class="btn btn-danger" href="carouseldelete.php?id='.$results['Id'].'">
            <span class="glyphicon glyphicon-remove"></span></a>
            </div>
            </div><br/>
          ';

      }

  	?>
    <div class = "row-fluid">
      <a class="btn btn-primary" href="carouseladd.php">
            <span class="glyphicon glyphicon-plus"></span> Add New</a>
    </div>
    </div>


  </body></html>