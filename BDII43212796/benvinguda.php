<?php
if(!isset($_SESSION)) {session_start();}
?>

<?php
if ($_SESSION["loggedIn"] == 1) {
	$user=$_SESSION["username"];
	$con=mysqli_connect("localhost","root","","BDII43212796");
	$query= "SELECT adreca FROM restaurant JOIN treballador ON
	treballador.id_restaurant = restaurant.id_restaurant WHERE
	treballador.nomUsuari = '".$user."'";

	$resultat=mysqli_query($con,$query);
	$fila=mysqli_fetch_array($resultat);
	$_SESSION["carrer"]=$fila['adreca'];

	mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="cat">
<html>
<?php
include "head.php";
?>

<body>
	<h1 align="center" style="font-size: 3vw;"> Benvingut al McFat del carrer
		<a href="contacte.php"><?php
		echo $_SESSION["carrer"];
		?></a></h1>
		<div align="center">
			<h3 style="font-size: 2vw;">Amb seu a Mallorca des de 2012, McFat ja té 56 restaurants
				repartits <br>
				per les Balears que generen uns 2.300 llocs de treball.</h3>

				<div class="container">
					<img src="imatges_web/portada.jpeg" class="image"
					style="border-radius:10px"
					>
					<div class="middle">
						<div class="text"><a href="productes.php"
							style="text-decoration:none">Tens gana?</a></div
							>
						</div>
					</div>
				</div>
			</div>
			<br>
			<footer>
				<p>Jefazos: Bernat Pericàs i Alejandro Calle</p>
				<p><a style="color:yellow" href="mailto:mcfatrestaurant@mcfat.cat">
					mcfatrestaurant@mcfat.cat</a></p>
				</footer>
			</body>
			</html>
