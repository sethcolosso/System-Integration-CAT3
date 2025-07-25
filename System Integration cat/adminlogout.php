
<?php
session_start();
 unset($_SESSION['password']);
	 unset($_SESSION['idno']);
session_destroy();
header("location:adminlogin.php");
	
	?>
	