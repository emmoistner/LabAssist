<?php

require "includeJS.php";

session_start();
if(isset($_SESSION['username'])){
}

function curPageName() 
{
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

/*FIND THE CURRENT ACTIVE PAGE. When echo a navbar button don't forget to add the variable to make it active. */
$indexActive = '';
$clockinActive = '';
$clockoutActive = '';
$importActive = '';
$accountActive = '';
$dashboardActive = '';
$settingsActive = '';
$accountdropdownActive ='';

if (curPageName() == "index.php")
{
	$indexActive = "class='active'";
}
if (curPageName() == "account.php")
{
	$accountActive = "class='active'";
}
if (curPageName() == "dashboard.php")
{
	$dashboardActive = "class='active'";
}
if (curPageName() == "settings.php")
{
	$settingsActive = "class='active'";
}
if (curPageName() == "clockin.php")
{
	$clockinActive = "class='active'";
}
if (curPageName() == "clockout.php")
{
  $clockoutActive = "class='active'";
}
if (curPageName() == "Import.php")
{
  $importActive = "class='active'";
}
if ($accountActive || $dashboardActive || $settingsActive == "class='active'")
{
	$accountdropdownActive = " active";
}
?>
<!-- NAVBAR -->
<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle 				navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
    <a class='navbar-brand' href='index.php'>LabTrack</a> </div>
  
  <!-- Group the nav links, forms, and other content for width toggling -->
  <div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
    <?PHP
	echo "<li ".$indexActive."><a href='index.php'>Home</a></li>";
	
    if (isset($_SESSION['Fname']))
	 { 
	 	echo "<li ".$clockinActive."><a href='clockin.php'>Clock-in</a></li>";
	 	echo "<li ".$importActive."><a href ='Import.php'>Classes</a></li>";
		?>
		<li class="dropdown<?php echo "$accountdropdownActive"; ?>">
        	<a href ="toggleDropdown()"  class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
        	<ul class="dropdown-menu" role="menu">
            <?PHP
				echo "<li ".$dashboardActive."><a href='dashboard.php'>Dashboard</a></li>";
				echo "<li ".$accountActive."><a href='account.php'>My Account</a></li>";
				echo "<li ".$settingsActive."><a href='settings.php'>Settings</a></li>";
			?>
			</ul> 
        </li>
		<?PHP
    if($_SESSION['active'])
    {
      echo "<li ".$clockoutActive."><a href='clockout.php'>Clock-out</a></li>";
    }
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
 <script> 
 $(document).ready(function () { $('.dropdown-toggle').dropdown(); }) //Makes the dropdown menu work. Stupid bootstrap...
 </script>
  </div>
</nav>
