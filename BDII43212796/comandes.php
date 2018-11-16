<?php
$con=mysqli_connect("localhost","root","","BDII43212796");
$queryA="SELECT nomElem, fotoArt, preuArt FROM Element JOIN Article ON id_element=id_article";
$resultatA=mysqli_query($con,$queryA);
$numfilesA=mysqli_num_rows($resultatA);

$queryM="SELECT nomElem, preuMenu FROM Element JOIN Menu ON id_element=id_menu";
$resultatM=mysqli_query($con,$queryM);
$numfilesM=mysqli_num_rows($resultatM);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php"
?>


<body>
	<div class="grid-container">
		<h2 style: align="center";>Menús</h2>
		<h2 style: align="center">Articles</h2>
		<div class="grid-container">
			<?php
			if ($numfilesM>0) {
				while ( $fila=mysqli_fetch_array($resultatM)) {
					echo "<div>".$fila['nomElem']."</div>";
				}
			}
			?>
		</div>
		<div class="grid-container">
			<?php
			if ($numfilesA>0) {
				while ( $fila=mysqli_fetch_array($resultatA)) {
					echo "<div>".$fila['nomElem']."</div>";
				}
			}
			?>
		</div>
	</div>

<img src="imatges_web/no_stock.gif">



</body>
</html>