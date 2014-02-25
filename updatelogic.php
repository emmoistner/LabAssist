<?php

    header("location:carousel.php");
    if(($_FILES["File"]["name"]) != '') {
      $filename= $_FILES["File"]["name"];
      move_uploaded_file($_FILES["File"]["tmp_name"],
      "img/" . $filename);
    }
    else {
      $filename= $_GET['loc'];
    }

      if(isset($_POST['Active'])) {
        $active = 1;
      }
      else {
        $active = 0;
      }

     $headlineText = $_POST['HeadlineText'];
     $buttonText = $_POST['ButtonText'];
     $buttonLink = $_POST['ButtonLink'];
     $subText = $_POST['SubText'];
     require('connect.php');
     $query = 'Update Carousel set Active= '.$active.', PictureLocation="'.$filename.'", HeadlineText= "'.$headlineText.'", SubText= "'.$subText.'", ButtonText="'.$buttonText.'", Custom_ID=null, ButtonLink="'.$buttonLink.'" where Id='. $_GET['id'];
     mysql_query($query, $link);
?>
