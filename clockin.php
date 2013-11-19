<?php
echo "<!DOCTYPE HTML5>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LabTrack</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>

	<link href='dist/css/bootstrap-responsive.css' rel='stylesheet'>
    <link href='dist/css/bootstrap.css' rel='stylesheet'>
    <link href='dist/css/bootstrap-Override.css' rel='stylesheet'>    
    <!-- Fav and touch icons 
    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='/apple-touch-icon-144-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='/apple-touch-icon-114-precomposed.png'>
      <link rel='apple-touch-icon-precomposed' sizes='72x72' href='/apple-touch-icon-72-precomposed.png'>
                    <link rel='apple-touch-icon-precomposed' href='ico/apple-touch-icon-57-precomposed.png'>
                                   <link rel='shortcut icon' href='ico/favicon.png'>
                                   
    -->

  </head>

  <body>

  		<script src='dist/js/jQuery-2.0.3.js'></script>
		
  		 <script src='dist/js/bootstrap.js'></script>

    <!-- NAVBAR -->
<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
    <a class='navbar-brand' href='#'>LabTrack</a> </div>
  
  <!-- Group the nav links, forms, and other content for width toggling -->
  <div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
      <li class='active'><a href='#'>Home</a></li>
    </ul>
    </li>
    </ul>
    <form class='navbar-form navbar-right' role='Login'>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Username'>
      </div>
      <div class='form-group'>
        <input type='text' class='form-control' placeholder='Password'/ >
      </div>
      <button type='submit' class='btn btn-default'>Login</button>
    </form>
  </div>
  <!-- navbar end --> 
</nav>
";

session_start();
//if(isset($_SESSION['userID'])){
	//$userId = $_SESSION['userId']; 
//commented out for testing with no log in
	echo "<script>function warning() {
		var x = confirm('Are you sure you want to clock in?')
		if(x == false) {
			event.preventDefault();
		}
	}</script>";


	echo " <div class='jumbotron'><div class ='container'>
    <a href='clockinlogic.php' class='btn btn-primary btn-lg btn-block' id='clockInButton' onclick='warning()'>Clock In</a></br>
    <div id='alert_placeholder'></div>
 </div></div>"; //use AJAX so you don't have to go to new page to clock in?

//}
//else
//{
//	echo "Not logged in, cannot clock in";
//}

echo "</body></html>";


?>