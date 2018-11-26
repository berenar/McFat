<?php
if(!isset($_SESSION))
{
	session_start();
}

$_SESSION['loggedIn'] = false;
session_destroy();
session_start();
header("LOCATION:./index.php");
?>
