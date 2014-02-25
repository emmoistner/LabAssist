
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LabTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<?PHP
	include 'files.php';

	?>
  </head>

  <body>



<?PHP
require "nav.php";
require("connect.php");
?>


    <!-- Carousel -->
    <div class="visible-lg visible-md">
    <div id="theCarousel" class="carousel slide">
      <div class="carousel-inner">
<?PHP
       $query = 'Select * from Carousel';
       $data = mysql_query($query, $link);
      if( $data === false){
        die( print_r(mysql_error(), true));
      } 

        $isActive = true;
        while($results = mysql_fetch_array($data, MYSQL_ASSOC)) {
          if($results['Active']) {
            if($isActive) {
              echo '<div class="item active">';
              $isActive = false;
            }
            else {
              echo '<div class="item">';
            }

             echo '<img src="img/'. $results['PictureLocation'] .'" alt="">
              <div class="container">
                <div class="carousel-caption">
                  <h1>'. $results['HeadlineText'].'</h1>
                  <p class="lead">'.$results['SubText'] .'</p>
                  <a class="btn btn-large btn-primary" href="'. $results['ButtonLink'].'">'.$results['ButtonText'] .'</a>
                </div>
              </div>
            </div>';
          }
        }
?>

      </div>
      <a class="left carousel-control" href="#theCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#theCarousel" data-slide="next">&rsaquo;</a>
      </div>
    </div><!-- /.carousel -->



    <!-- Instructor Information -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row-fluid">
        
        <?PHP
        $sql = 'Select * from instructorbio';
        $answer = mysql_query($sql, $link);
         while($result = mysql_fetch_array($answer, MYSQL_ASSOC)) {
          $sql2 = 'Select Fname, Lname from Capstoneusers where id =' . $result['ID'];
          $answer2 = mysql_query($sql2, $link);

          $result2 = mysql_fetch_array($answer2, MYSQL_ASSOC);


        echo '<div class="span4">
          <img class="img-circle" src="'.$result['PictureLocation'].'">
          <h2>' . $result2['Fname'] . ' ' . $result2['Lname'] . '</h2>
          <p>'.$result['QuickBio'].'</p>
          <p><a class="btn" href="'.$result['ClassUrl'].'">View details &raquo;</a></p>
        </div><!-- /.span4 -->';
        }

        ?>
  
       </div><!-- /.row -->
   <hr class="featurette-divider">
      
   <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>2013 Ball State University 2000 W. University Ave. Muncie, IN 47306· <a href="http://www.bsu.edu">bsu.edu</a></p>
  </footer>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/jquery-2.0.3.js"></script>
	<script src="dist/js/bootstrap.js"></script>
    <script>		
      !function ($) {
        $(function(){
          // carousel 
          $('#theCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="dist/js/holder.js"></script>
  </body>
</html>
