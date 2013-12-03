<?php

require "includeJS.php";

session_start();
if(isset($_SESSION['username'])){
}

?>

<!-- NAVBAR -->
<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle 				navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
    <a class='navbar-brand' href='#'>LabTrack</a> </div>
  
  <!-- Group the nav links, forms, and other content for width toggling -->
  <div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
      <li class='active'><a href='index.html'>Home</a></li>
      <?PHP
    if (isset($_SESSION['Fname']))
	 { echo "<li><a href='clockin.php'>Clock-in</a></li>";
	 }
	 ?>
    </ul>
    <?PHP
    if (isset($_SESSION['Fname']))
	 {
	echo "<form method='post' action='logout.php'  class='navbar-form navbar-right' role='Logout'>  
	  <button type='submit' class='btn btn-default'>Logout</button>
    </form>
	<p class='navbar-text pull-right'>".$_SESSION['Lname'].', '.$_SESSION['Fname']."</p>";
	  } else { 
	echo "<form method='post' action='checklogin.php'  class='navbar-form navbar-right' role='Login'>
      <div class='form-group'>
        <input type='text' class='form-control' name='username' id='username' placeholder='Username' value=''/>
      </div>
      <div class='form-group'>
        <input type='password' class='form-control' name='password' id='password' placeholder='Password'value='' />
      </div>
	   <button type='submit' class='btn btn-default'>Login</button>
    </form>";
	}
	?>
  </div>
</nav>