<?php
if(!isset($_SESSION)) {session_start();}

$con=mysqli_connect("localhost","root","","BDII43212796");
print_r($_SESSION);echo "<br>";
print_r($_POST);echo "<br>";

$carrer=$_SESSION["carrer"];
$queryR="SELECT id_restaurant FROM Restaurant WHERE adreca= '$carrer'";
// $queryM="SELECT * FROM Menu WHERE id_menu = $id_carro";
$resultatR=mysqli_query($con,$queryR);
$filaR=mysqli_fetch_array($resultatR);

// atributs de comanda
$preu_total=$_POST["preu"];
$id_restaurant=$filaR["id_restaurant"];
$targeta=$_POST["targeta"];
$estat="Preparant";
$id_comanda;

$queryC="INSERT INTO Comanda (estat,targeta,id_restaurant,total) VALUES ('$estat','$targeta','$id_restaurant','$preu_total')";
$resultatC=mysqli_query($con,$queryC);
if ($resultatC=1) {
	//insert exitós
	//obtenim l'id_comanda del darrer INSERT
	$queryC_id="SELECT MAX(id_comanda) FROM Comanda WHERE id_restaurant='$id_restaurant'";
	$resultatC_id=mysqli_query($con,$queryC_id);
	$filaC_id=mysqli_fetch_array($resultatC_id);
	$id_comanda=$filaC_id["MAX(id_comanda)"];

	//tots els elements d'aquesta comanda
	$array=$_SESSION["ids_comanda"];

	// afegim Comanda i recuperam l'id_comanda associat

	// afegir a Quantitat per cada posició de l'array de ids
	foreach ($array as $id_elem) {

		// mirar si existeix dins Quantitat
		$queryExisteix="SELECT numQuant FROM Quantitat WHERE id_element='$id_elem' AND id_comanda='$id_comanda'";
		$resultatExisteix=mysqli_query($con,$queryExisteix);
		$filaExisteix=mysqli_fetch_array($resultatExisteix);
		$quant=$filaExisteix["numQuant"];
		if ($quant>0) {
			// ja hi ha aquest id a Quantitat
			//inrementar numQuant d'aquest element
			$queryIncrementa="UPDATE Quantitat SET numQuant=numQuant+1 WHERE id_element='$id_elem'";
			$resultatIncrementa=mysqli_query($con,$queryIncrementa);
		}else{
			// no hi ha aquest element dins Quantitat
			$queryQ="INSERT INTO Quantitat (numQuant,id_comanda,id_element) VALUES ('1','$id_comanda','$id_elem')";
			$resultatQ=mysqli_query($con,$queryQ);
		}
	}

	//actualitzar estoc de cada article
	foreach ($array as $id_elem) {
		//és un article o un menú?
		$queryM="SELECT * FROM Menu WHERE id_menu = $id_elem";
		$resultatM=mysqli_query($con,$queryM);
		$filaM = mysqli_fetch_array($resultatM);
		if (mysqli_num_rows($resultatM)>0) {
			//és un menú
			//obtenir els ids dels elements del menú
			$queryArticlesMenu="SELECT id_element FROM menu JOIN r_menu_article on
			id_menu=id_elementM JOIN article ON id_elementA=id_article JOIN
			element on id_article=id_element WHERE id_menu=$id_elem";
			$resultatAM=mysqli_query($con,$queryArticlesMenu);
			$numfilesAM=mysqli_num_rows($resultatAM);
			if ($numfilesAM>0){
				while ($filaAM=mysqli_fetch_array($resultatAM)) {
					$queryUpdEstoc="UPDATE ESTOC SET numEst=numEst-1 
					WHERE id_element=".$filaAM["id_element"]. " AND id_restaurant=$id_restaurant";
					$resultatUpdEstoc=mysqli_query($con,$queryUpdEstoc);
				}
			}
		}else{
			//és un article
			$queryUpdEstocA="UPDATE ESTOC SET numEst=numEst-1 
			WHERE id_element=".$id_elem. " AND id_restaurant=".$id_restaurant;
			$resultatUpdEstocA=mysqli_query($con,$queryUpdEstocA);
			echo "fent: ".$queryUpdEstocA;
		}
	}

	//per saber si aquest usuari ha realitzat una comanda
	$_SESSION["comanda"]=TRUE;

	header("LOCATION: ./tiquet.php");

}else{
	echo "No s'ha pogut crear la comanda";
	header("LOCATION: ./benvinguda.php");
}


?>