<?PHP

$active = "class='active'";
$dashboardActive = '';
$accountActive = '';
$settingsActive = '';


echo "<div class='row-fluid'>
  	<div class='span3 offset2'>
 	 <ol class='breadcrumb'>";

if (curPageName() == "dashboard.php")
{
	echo "<li ".$active.">Dashboard</li>";
}
if (curPageName() == "account.php")
{
	echo "<li><a href ='dashboard.php'>Dashboard</a></li>";
	echo "<li ".$active.">My Account</li>";
}
if (curPageName() == "settings.php")
{
	echo "<li><a href ='dashboard.php'>Dashboard</a></li>";
	echo "<li><a href ='account.php'>My Account</a></li>";
	echo "<li ".$active.">Settings</li>";
}
?>
	</ol>
  </div>
  <!-- /.span4 --> 
</div>
<!-- /.row -->

