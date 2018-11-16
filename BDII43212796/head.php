
<head>

	<link rel="icon" href="imatges_web/fav_mcfat.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>McFat</title>
	<div class=cap>
		<img src="imatges_web/Logo_McFat.png" alt="logo de l'empresa"
		style="width: 20%; height: 20%;">
		<?php print_r($_SESSION) ?>
		<ul style="border-radius: 10px">
			<li><a href="benvinguda.php">Benvinguda</a></li>
			<li><a href="comandes.php">Comandes</a></li>
			<li><a href="contacte.php">Contacte</a></li>
			<li><a href="ajuda.php">Ajuda</a></li>
			<li><a href="log-out.php">Canvia de restaurant</a></li>

			<?php if($_SESSION['loggedIn'] == 1) { ?>
				<li style="float: right;"><b href=""><?php echo $_SESSION["username"];?></a></li>
				<?php }else{ ?>
					<li style="float: right;"><b>ANÒNIM</b></li>
				<?php
				} ?>

			</ul>
		</div>
	</head>



	<style>
	.cap{
		background-color: red;
		border-radius: 10px;
	}
	.submit{
		border-radius: 5px;
	}
	.introtext{
		border-radius: 5px;
	}
</style>

<style>
body{
	font-family: 'Roboto', sans-serif;
}
</style>

<style>
ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #800000;
}

li {
	float: left;
}

li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}
li b {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

li a:hover:not(.active) {
	background-color: #111;
}

.active {
	background-color: black;
}
</style>

<style>
.container {
	position: relative;
	width: 100%;
}

.image {
	opacity: 1;
	display: block;
	width: 100%;
	height: auto;
	transition: .5s ease;
	backface-visibility: hidden;
}

.middle {
	transition: 1s ease;
	opacity: 0;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%)
}

.container:hover .image {
	opacity: 0.7;
}

.container:hover .middle {
	opacity: 1;
}

.text {
	background-color: blur;
	color: black;
	font-size: 60px;
	padding: 16px 32px;
}
</style>

<style>
.grid-container {
	border-radius: 10px;
	display: grid;
	grid-template-columns: auto auto;
	grid-gap: 10px;
	padding: 10px;
}
.grid-container > div {
	border-radius: 10px;
	background-color: rgba(255, 255, 255, 0.8);
	border: 1px solid black;
	text-align: center;
	font-size: 1.1em;
	padding: 5%;
}
</style>
