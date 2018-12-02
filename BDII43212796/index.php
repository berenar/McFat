<?php
if(!isset($_SESSION)) {session_start();}

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
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>

<div align="center"><img src="imatges_web/Logo_McFat.png"
	style="width: 50%; height: 30%">
</div>

<body>
	<div class="row" align="center">
		<div class="col-sm-6">
			<h1 style="padding: 0;margin: 0;font-size: 2vw;">A quin restaurant vols anar?</h1>
			<div>
				<?php if( $numfiles > 0 ){ ?>
					<br><b style="font-size: 2vw">McFat del carrer </b>
					<form action="anar_a_restaurant.php" method="post">
						<select name="carrer" style="border-radius: 5px; font-size: 2vw">
							<?php
							while ($fila=mysqli_fetch_array($resultat)) {
								// <option value="volvo">Volvo</option>
								echo "<option style=\"font-size: 2vw\" value='".$fila['adreca']."'>".$fila['adreca'].
								"</option>";
							}
							?>
						</select>
						<br>
						<br><input type="submit" value= "Entra com a anònim"
						style="border-radius: 5px; font-size: 2vw"><br><br><br><br>
					</form>

					<?php
				}else{
					echo "No hi ha cap restaurant disponible";
				}
				?>
			</div>
		</form>
	</div>
	<div class="col-sm-6">
		<h1 style="padding: 0;margin: 0;font-size: 2vw;">Inicia sessió com a
			Treballador
		</h1>
		<br>
		<form action="log-in.php" method="POST">
			<label><b style="font-size: 2vw">Nom d'usuari</b></label>
			<input style="border-radius: 5px" type="text" name="uname" required><br>
			<br><label><b style="font-size: 2vw">Contrasenya</b></label>
			<input style="border-radius: 5px" type="password" name="psw" required><br>
			<br><input type="submit" value="Entra com a treballador"
			style="border-radius: 5px;font-size: 2vw"><br><br>
			<?php
			if (!empty($_SESSION)) {
				?>
				<div class="alert alert-danger alert-dismissible fade in" style="width:70%">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong> <?php echo $_SESSION['misserror']; ?>
				</div>
				<?php
			}
			?>
		</div>
	</form>
</div>
<a target="_blank" rel="noopener noreferrer" 
href="https://github.com/berenar">
<img style="position: absolute; top: 0; right: 0; border: 0;"
src="https://s3.amazonaws.com/github/ribbons/
forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>
</body>
