<?php
session_start();
if(isset($_SESSION['Fname'])) {
header("Location: index.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>