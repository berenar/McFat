<?php
if(!isset($_SESSION)) {session_start();}

// si és buid no fer res
if (empty($_SESSION["ids_comanda"])) {
	header("LOCATION: ./carro.php");
}


$array=$_SESSION["ids_comanda"];

if (($key = array_search($_POST["id"], $array)) !== false) {
	unset($array[$key]);
}

$_SESSION["ids_comanda"]=$array;

header("LOCATION: ./carro.php");
?>