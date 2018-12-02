<?php
if(!isset($_SESSION)) {session_start();}

print_r($_POST);echo "<br>";

$con=mysqli_connect("localhost","root","","BDII43212796");

$id=$_POST["id"];

if (array_key_exists("estat",$_POST)) {
	$estat = $_POST["estat"];
	$queryE="UPDATE Comanda SET estat = '$estat' WHERE id_comanda = $id;";
	$resultatE=mysqli_query($con,$queryE);
}

if (array_key_exists("pagatono",$_POST)) {
	$pagatono = $_POST["pagatono"];
	$queryP="UPDATE Comanda SET pagat = $pagatono WHERE id_comanda = $id;";
	$resultatP=mysqli_query($con,$queryP);
}

 header("LOCATION: ./comandes.php");

?>
