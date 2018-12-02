<?php
if(!isset($_SESSION)) {session_start();}
include "estil.css";
$con=mysqli_connect("localhost","root","","BDII43212796");

//obtenim l'id del resuaturant
$carrer=$_SESSION["carrer"];
$queryR="SELECT id_restaurant FROM Restaurant WHERE adreca= '$carrer'";
// $queryM="SELECT * FROM Menu WHERE id_menu = $id_carro";
$resultatR=mysqli_query($con,$queryR);
$filaR=mysqli_fetch_array($resultatR);
$id_restaurant=$filaR["id_restaurant"];

//obtenim l'id de la darrera comanda
$queryC_id="SELECT MAX(id_comanda) FROM Comanda WHERE id_restaurant='$id_restaurant'";
$resultatC_id=mysqli_query($con,$queryC_id);
$filaC_id=mysqli_fetch_array($resultatC_id);
$id_comanda=$filaC_id["MAX(id_comanda)"];

$preuCarro=0;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tiquet de compra</title>
</head>
<body>
	<div align="center">
		<div class=tiquet>
			<div class="quadre_negre">
				<?php echo $id_comanda; ?>
			</div>
			<div align="center" style="font-size: 2vw">
				<p style="font-size: 1vw">
					Restaurant McFat <br>
					C/   <?php echo $_SESSION["carrer"]; ?> 
					S/N locales 29-33 <br>
					28980 Madrid <br>
					Telf: 913.250.433 <br>
				</p>
				<hr>

				Num comanda: <?php echo $id_comanda; ?>

				<?php

				$array=$_SESSION["ids_comanda"];
				foreach ($array as $id_carro) {
      				// per saber si es un menú
					$queryM="SELECT * FROM Menu WHERE id_menu = $id_carro";
					$resultatM=mysqli_query($con,$queryM);
					$filaM = mysqli_fetch_array($resultatM);
					if (mysqli_num_rows($resultatM)>0) {
        				// és un menú
						$queryM="SELECT Element.nomElem,Menu.preuMenu FROM Element JOIN Menu WHERE id_element = $id_carro";
						$resultatM=mysqli_query($con,$queryM);
						$filaM = mysqli_fetch_array($resultatM);
						$preuCarro=$preuCarro+$filaM["preuMenu"];

						echo "<h3>".$filaM["nomElem"]." (".$filaM["preuMenu"]."€)"."</h3>";

						$queryArticlesMenu="SELECT nomElem FROM menu JOIN r_menu_article on
						id_menu=id_elementM JOIN article ON id_elementA=id_article JOIN
						element on id_article=id_element WHERE id_menu=$id_carro";
						$resultatAM=mysqli_query($con,$queryArticlesMenu);
						$numfilesAM=mysqli_num_rows($resultatAM);
						if ($numfilesAM>0){
							while ($filaAM=mysqli_fetch_array($resultatAM)) {
								?>
								<p><?php echo "·".$filaAM["nomElem"] ?></p>
								<?php
							}
						}
					}else{
        				// és un article
						$queryE="SELECT Element.nomElem,Article.preuArt FROM Element JOIN Article WHERE id_element = $id_carro";
						$resultatE=mysqli_query($con,$queryE);
						$filaE = mysqli_fetch_array($resultatE);
						$preuCarro=$preuCarro+$filaE["preuArt"];
						
						echo "<h3>".$filaE["nomElem"]." (".$filaE["preuArt"]."€)"."</h3>";
					}
				}
				?>
				<hr>
				<h1>Total: <?php echo $preuCarro;?>€</h1>
				<?php 

				?>
				Gràcies per la seva visita!<br>
				Esperam veure't aviat <h1 style="display: inline-block;">&#9786</h1><br>
				<?php date_default_timezone_set('Europe/Madrid');
				$date = date('m/d/Y h:i:s a', time());
				echo $date;?>
			</div>

		</div>
		<br>
		<a href="comprat.php"><input type="submit" value="Torna" class=""></a>
	</div>
</body>
</html>

