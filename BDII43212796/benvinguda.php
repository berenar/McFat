<?php
if(!isset($_SESSION)) {session_start();}
?>
<?php
$user=$_SESSION["username"];
$con=mysqli_connect("localhost","root","","BDII43212796");
$query="SELECT adreca FROM Restaurant JOIN Treballador ON '".$user."'=";
$resultat=mysqli_query($con,$queryA);
?>

<!DOCTYPE html>
<html lang="cat">
<html>

<?php 
include "head.php";
?>

<body>
	<h1 align="center"> Benvingut al McFat del carrer 
		<a href="contacte.php"><?php 
		if($_SESSION['loggedIn'] == 0) { echo $_SESSION["carrer"];}else{ 
		}?></a></h1>
	<div align="center">
		<h3>Amb seu a Mallorca des de 2012, McFat ja té 56 restaurants 
			repartits <br>
			per les Balears que generen uns 2.300 llocs de treball.</h3>

		<div class="container">
			<img src="imatges_web/portada.jpeg" alt="pizzaportada" class="image" style="width:100%; border-radius:10px">
			<div class="middle">
				<div class="text"><a href="comandes.php" style="text-decoration:none">Tens gana?</a></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

