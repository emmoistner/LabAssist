<?PHP
header("Location: index.php");
session_start();
unset($_SESSION['Fname']);
unset($_SESSION['Lname']);
session_destroy();
?>