<?php
if(!isset($_SESSION)) {session_start();}

// primera comanda
// si es buid, crear l'array dins session
if (empty($_SESSION["ids_comanda"])) {
	$array=array();
	$_SESSION["ids_comanda"]=$array;
}

// totes les comandes
// insertar id de l'element a comprar dins l'array
$array=$_SESSION["ids_comanda"];
array_push($array,$_POST["id"]);
$_SESSION["ids_comanda"]=$array;

header("LOCATION: ./carro.php");
?>
