<html>
<head>
  </head>
</body>
<?php
 

     
      require ('nav.php');
      require ('includeJS.php');
      require ('files.php');
      require ('connect.php');

      $currentPass = $_POST['CurrentPass'];
     $newPass = $_POST['password'];
     $id = $_SESSION['ID'];


   
     $query = 'Select * from UserAccounts where id ='. $id;
     $response = mysql_query($query, $link);
     $results = mysql_fetch_array($response);
     $pass = $results['Pass'];
     if($pass == sha1($currentPass)) {
      $query2 = "Update UserAccounts set Pass ='".sha1($newPass)."' where id = ".$id; 
      mysql_query($query2, $link);
        echo '<div class = "alert alert-success">Password changed.</div>';
     }
     else {
       echo '<div class = "alert alert-danger">Incorrect current password provided. <a href="changepassword.php">Try again.</a></div>';
     }
     
?>
</body>
</html>
