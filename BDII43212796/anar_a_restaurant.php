<?php
if(!isset($_SESSION)) {session_start();}


$carrer= $_POST['carrer'];
$_SESSION["loggedIn"]=0;
$_SESSION["carrer"]=$carrer;
unset($_SESSION['misserror']);
header("LOCATION: ./benvinguda.php");

?>
