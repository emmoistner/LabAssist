<?php
  session_start();
  if(!isset($_SESSION['Fname']) || $_SESSION['Administrator']==0) {
  header("location:index.php");
} else {
		//header("location:index.php");
		$filename = $_FILES["File"]["name"];
      move_uploaded_file($_FILES["File"]["tmp_name"],
      "img/" . $filename);



     $ID = $_POST['ID'];
     $email = $_POST['email'];
     $fname = $_POST['Fname'];
     $lname = $_POST['Lname'];
     $url = $_POST['url'];
     $bio = $_POST['Bio'];
     require('connect.php');
     $query = 'Insert into CapstoneUsers values('.$ID.', "'.$email.'", "'.$fname.'", null, "'.$lname.'", null, '.$ID.', null, null, 0)';
     mysql_query($query, $link);
     $query2 = 'Insert into InstructorBio values('.$ID.', "'.$bio.'", "'.$url.'", "img/'.$filename.'")';
     mysql_query($query2, $link);
     $query3 = 'Insert into accountlevel values('.$ID.', 0, 1, 0 , 0)';
     mysql_query($query3, $link);
   }
?>