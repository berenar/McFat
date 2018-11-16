<?php

if(!isset($_SESSION)) {session_start();}

$carrer= $_POST['carrer'];
$_SESSION["loggedIn"]=0;
$_SESSION["carrer"]=$carrer;
header("LOCATION: ./benvinguda.php");

?>