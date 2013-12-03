
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LabTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<link href="dist/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-Override.css" rel="stylesheet">    
	<link rel="shortcut icon" href="img/favicon.ico" />
  </head>

  <body>



<?PHP
require "nav.php";
?>


    <!-- Carousel -->
    <div class="visible-lg visible-md">
    <div id="theCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/IMG_0936edit.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Login to get started</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/IMG_0933edit.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/IMG_0829edit.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Here is another headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div>
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
        <div class="span4">
          <img class="img-circle" src="img/Lucas_Patricia.jpg">
          <h2>Patricia Lucas</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" src="img/Johnson_Rick.jpg">
          <h2>Rick Johnson</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" src="img/Hua_David.jpg">
          <h2>David Hua</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
      </div><!-- /.row -->
      <div class="row-fluid">
        <div class="span4 offset2">
          <img class="img-circle" src="holder.js/125x175">
          <h2>Robert Turner</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" src="holder.js/125x175">
          <h2>Christopher Davison</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
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
