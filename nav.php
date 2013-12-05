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
if (curPageName() == "index.php")
{
<<<<<<< HEAD
  $indexActive = "class='active'";
}
if (curPageName() == "clockin.php")
{
  $clockinActive = "class='active'";
=======
	$indexActive = "class='active'";
}
if (curPageName() == "clockin.php")
{
	$clockinActive = "class='active'";
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
}
if (curPageName() == "clockout.php")
{
  $clockoutActive = "class='active'";
}
<<<<<<< HEAD
=======

if (curPageName() == "Import.php")
{
  $importActive = "class='active'";
}
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
?>

<!-- NAVBAR -->
<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
<<<<<<< HEAD
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle         navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
=======
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'> <span class='sr-only'>Toggle 				navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
    <a class='navbar-brand' href='index.php'>LabTrack</a> </div>
  
  <!-- Group the nav links, forms, and other content for width toggling -->
  <div class='collapse navbar-collapse navbar-ex1-collapse'>
    <ul class='nav navbar-nav'>
    <?PHP
<<<<<<< HEAD
  echo "<li ".$indexActive."><a href='index.php'>Home</a></li>";
  
    if (isset($_SESSION['Fname']))
   { echo "<li ".$clockinActive."><a href='clockin.php'>Clock-in</a></li>";
=======
	echo "<li ".$indexActive."><a href='index.php'>Home</a></li>";
	
    if (isset($_SESSION['Fname']))
	 { 
	 	echo "<li ".$clockinActive."><a href='clockin.php'>Clock-in</a></li>";
	 	echo "<li ".$importActive."><a href ='Import.php'>Classes</a></li>";
		
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
    if($_SESSION['active'])
    {
      echo "<li ".$clockoutActive."><a href='clockout.php'>Clock-out</a></li>";
    }
<<<<<<< HEAD
   }
   ?>
=======
	 }
	 ?>
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
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
<<<<<<< HEAD
     <button type='submit' class='btn btn-default'>Login</button>
    </form>";
  }
  ?>
=======
	     <button type='submit' class='btn btn-default'>Login</button>
    </form>";
  }
 ?>
>>>>>>> b8eb00bc76aeecd9b38876df0a77992d6444c805
  </div>
</nav>
