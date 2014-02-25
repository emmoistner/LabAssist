<?php

		header("location:carousel.php");
		$filename = $_FILES["File"]["name"];
      move_uploaded_file($_FILES["File"]["tmp_name"],
      "img/" . $filename);

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
     $query = 'Insert into Carousel values(null, '.$active.', "'.$filename.'", "'.$headlineText.'", "'.$subText.'", "'.$buttonText.'", null, "'.$buttonLink.'")';
     mysql_query($query, $link);
?>
