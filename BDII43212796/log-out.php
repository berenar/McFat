<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

$_SESSION['loggedIn'] = false;
session_destroy();
header("LOCATION:./index.php");
?>
