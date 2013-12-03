<?php

require "includeJS.php";



/*if(session_id() == '') {
session_start();
}
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}
if(isset($_SESSION['isAdmin'])){
	$isAdmin = $_SESSION['isAdmin'];
}*/

?>
<html>
	<head>
		<meta charset='utf-8'>
		<title>LabTrack</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='description' content=''>
		<meta name='author' content=''>

		<link href='dist/css/bootstrap-responsive.css' rel='stylesheet'>
		<link href='dist/css/bootstrap.css' rel='stylesheet'>
		<link href='dist/css/bootstrap-Override.css' rel='stylesheet'>    
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class='navbar navbar-default' role='navigation'>
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle 				navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
				<a class='navbar-brand' href='#'>LabTrack</a> 
			</div>
  
			<!-- Group the nav links, forms, and other content for width toggling -->
			<div class='collapse navbar-collapse navbar-ex1-collapse'>
					<ul class='nav navbar-nav'>
						<li class='active'><a href='index.html'>Home</a></li>
						<li><a href="clockin.php">Clock-in</a></li>	
					</ul>
					<form method="post" action="checklogin.php"  class='navbar-form navbar-right' role='Login'>
						<div class='form-group'>
							<input type='text' class='form-control' name="username" id="username" placeholder='Username' value="" />										</div>
						<div class='form-group'>
							<input type='password' class='form-control' name="password" id="password" placeholder='Password'value="" />
						</div>
						<button type='submit' class='btn btn-default'>Login</button>
					</form>
			</div>
		</nav>
	</body>
</html>




<!--echo '<ul id="nav">';

	if(!isset($username)){
	if(isset($username)) {
	//main menu additions for user
		echo '<li><a href="news.php"> Website Changelog </a></li>';

		//menu items for admins
		if(isset($isAdmin) && $isAdmin == true) {
				echo '<li> <a href="#"> Management </a>
					<ul>
						<li><a href="ProductInsert.php">Insert</a></li>
						<li><a href="ChooseTable.php">Update</a></li>
					</ul>
				</li>';
			}
		}
	echo '</ul>';	
	
	if(isset($username)) {
		echo '<a href="userPortal.php">'.$username.'</a>';
		echo '<a href="logout.php"><img src="logoutButton.jpg" width="12" height="16"></a> </div>';
			
	} else {
		echo '<a href="registration.php">Member Registration</a>';
		echo '<a href="login.php">   Login</a>';
		echo '</div>'; }
	
	echo '<br />'; */
?> -->