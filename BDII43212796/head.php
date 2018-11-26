<head>
																											<!-- <?php print_r($_SESSION); ?> -->
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php include "estil.css" ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>McFat</title>
	<div class=cap>
		<img src="imatges_web/Logo_McFat.png" alt="logo de l'empresa"
		style="width: 20%; height: 20%;">
		<ul style="border-radius: 10px">
			<li><a href="benvinguda.php">Benvinguda</a></li>
			<li><a href="productes.php">Productes</a></li>
			<li><a href="categories.php">Categories</a></li>
			<li><a href="contacte.php">Contacte</a></li>
			<li><a href="ajuda.php">Ajuda</a></li>
			<li><a href="log-out.php">Surt</a></li>
			<li><a href="carro.php"><img src="imatges_web/micarro.png" style="max-width: 1.5vw;"></a></li>
			<?php
			if (!empty($_SESSION["ids_comanda"])) {
				?>
				<span class=dot><h1 style="font-size: 15px">
					<?php echo count($_SESSION["ids_comanda"]) ?></h1></span>
				<?php
				}
			 ?>

			<?php if($_SESSION['loggedIn'] == 1) { ?>

				<li style="float: right;"><b href=""><?php echo $_SESSION["username"];?>
				</a></li>
				<li style="float: right;"><a href="modifica_comandes.php">Modifica comandes</a></li>
				<?php }else{ ?>
					<li style="float: right;"><b>ANÒNIM</b></li>
					<?php
				} ?>


			</ul>
		</div>
	</head>
