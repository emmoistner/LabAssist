<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>LabTrack</title>
<?PHP
  require('files.php');
  require ('includeJS.php');
  ?>

<body>
<?php
    require('nav.php');
    require('connect.php');
    require('files.php');
    
    if(!isset($_SESSION['Fname'])) {
  header("location:index.php");
}
    ?>
<div class="row-fluid">
  <div class="span3 offset2"> <div class="jumbotron">
          
    <form action ="passwordlogic.php" id="inform" method="post" class="form-inline">
      <div class="row-fluid">
        <div class="span9">
          <div class="form-group">
          <input type ="password" class="form-control" placeholder="Current Password" id="CurrentPass" name ="CurrentPass" maxlength="255"/>
        </div>
        </div>
       <br />
      </div>
      <div class="row-fluid">
        <div class="span9">
        <div class="form-group">
          <input type ="password" class="form-control" placeholder="New Password" id ="password" name ="password" maxlength="255">
        </div>
        </div>
        <br />
      </div>
      <div class="row-fluid">
        <div class="span9">
        <div class="form-group">
          <input type ="password" class="form-control" placeholder="Repeat New Password" id="passwordSecond" name ="passwordSecond" maxlength="255">
          </div>
        </div>
        <br />
      </div>
      <div class="row-fluid">
        <div class="span2">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Change Password</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <div class="span4 offset1">
  	<h3>Change your password</h3>  
	<p>Enter a new password for <?PHP echo $_SESSION['Uname'];?>. We highly recommend you create a unique password - one that you don't use for any other websites.</p>
  
  </div>
</div>
</div>
</body
  >
</head>
<script>  
//jQuery Validator Override
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
//End Override

//Form Validation
    $("#inform").validate({
  rules: {  
  	CurrentPass: "required",
    password: "required",
    passwordSecond: {equalTo: "#password"}
  },
  messages: {
    passwordSecond: "<h4>Passwords not equal</h4>",
	CurrentPass: "<h4>Field is required</h4>",
	password: "<h4>Field is required</h4>"
  }
});
   </script>
>
</html>