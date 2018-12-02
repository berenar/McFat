<head>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php include "estil.css" ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>McFat</title>
	<div class=cap>
		<a href="benvinguda.php"><img src="imatges_web/Logo_McFat.png" alt="logo de l'empresa"
		style="width: 20%; height: 20%;"></a>
		
		<ul style="border-radius: 10px">
			<li><a href="benvinguda.php">Benvinguda</a></li>
			<li><a href="productes.php">Productes</a></li>
			<li><a href="categories.php">Categories</a></li>
			<li><a href="contacte.php">Contacte</a></li>
			<li><a href="ajuda.php">Ajuda</a></li>
			<li><a href="log-out.php">Surt</a></li>

			<!-- mostrar carro si ha seleccionat algun element -->
			<?php if (!empty($_SESSION["ids_comanda"])) {
				?>
				<li><a href="carro.php"><img src="imatges_web/micarro.png" style="max-width: 1.5vw;"><?php echo count($_SESSION["ids_comanda"]); ?></a></li>
				<?php
			}

			// si es treballador, mostrar sempre pestanya Comandes
			if ($_SESSION["loggedIn"]==TRUE) {
				echo "<li><a href=\"comandes.php\">Comandes</a></li>";
			}
			//sinó, comprovar que hagi fet alguna comanda abans
			else if (array_key_exists("comanda",$_SESSION)) {
				if ($_SESSION["comanda"]==TRUE) {
					echo "<li><a href=\"comandes.php\">Comandes</a></li>";
				}
			}
			if($_SESSION['loggedIn'] == 1) { ?>
				<!-- mostrar nom del treballador -->
				<li style="float: right;"><b href=""><?php echo $_SESSION["username"];?>
			</a></li>
		<?php }else{ ?>
			<!-- mostra nom: ANÒNIM -->
			<li style="float: right;"><b>ANÒNIM</b></li>
			<?php
		} ?>


	</ul>
</div>
</head>
