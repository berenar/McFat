<?php
$con=mysqli_connect("localhost","root","","BDII43212796");
$query="SELECT* FROM restaurant";
// echo "estam provant de fer un:     ".$query;
$resultat=mysqli_query($con,$query);
$numfiles=mysqli_num_rows($resultat);
mysqli_close($con);
?>
  
<!DOCTYPE html>
<html lang="cat">
<html>
<title>McFat</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div align="center"><img src="imatges_web/Logo_McFat.png" style="width: 60%; height: 50%"></div>
<body style="font-family: 'Roboto', sans-serif; padding:0; margin:0;">

	<div class="row" align="center">
		<div class="col-sm-4">
			<h1 align="center" style="padding: 0;margin: 0;">A quin restaurant vols anar?</h1>
			<div align="center">
				<?php if( $numfiles > 0 ){ ?>
					<br>McFat de
					<form action="anar_a_restaurant.php" method="post">
						<select name="carrer" style="border-radius: 5px">
							<?php
							while ($fila=mysqli_fetch_array($resultat)) {
					 // <option value="volvo">Volvo</option>
								echo "<option value='".$fila['adreca']."'>".$fila['adreca']."</option>";
							}
							?>
						</select>
						<br>
						<br><input type="submit" value= "Entra com a anònim" style="border-radius: 5px">
					</form>

					<?php
				}else{
					echo "No hi ha cap restaurant disponible";
				}
				?>
			</div>
		</form>
	</div>
	<div class="col-sm-4">
		<h1 align="center" style="padding: 0;margin: 0;">Inicia sessió com a Treballador</h1><br>
		<form action="log-in.php" method="POST">
			<label><b>Nom d'usuari</b></label>
			<input style="border-radius: 5px" type="text" name="uname" required><br><br>

			<label><b>Contrasenya</b></label>
			<input style="border-radius: 5px" type="password" name="psw" required><br><br>
			<input type="submit" value="Entra com a treballador" style="border-radius: 5px">

		</div>
	</form>
</div>
</div>





</body>
</html>
