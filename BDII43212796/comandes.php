<?php if(!isset($_SESSION)) {session_start();}
$con=mysqli_connect("localhost","root","","BDII43212796");
$queryC="SELECT id_comanda, estat, pagat FROM Comanda";
$resultatC=mysqli_query($con,$queryC);
?>
<!DOCTYPE html>
<html>
<?php include "head.php" ?>
<body>
	<h1 style="font-size: 3vw">Comandes actives</h1>
	<?php 
	while ($filaC=mysqli_fetch_array($resultatC)) {
		// per saber si s'ha pagat o no
		if ($filaC["pagat"]==0) {
			$pagatono="No pagat";
		}else{
			$pagatono="Pagat";
		}

		?>
		<form action="modifica_comanda.php" method="POST">
			<div class="mateixaLinia" style="width: 60%">
				<input type="text" style="font-size: 2vw; max-width: 50px;min-width: 25px" name="id" 
				value="<?php echo $filaC["id_comanda"] ?>" readonly>
				<p>&nbsp&nbsp&nbsp&nbsp</p>
				<select name= estat style="font-size:2vw;min-width:80px;max-width:150px"
				<?php if ($_SESSION["loggedIn"]==FALSE) {
					echo "disabled";
				} ?>>
				<option value="" selected disabled hidden><?php echo $filaC["estat"] ?></option>
				<option value="Preparant">Preparant</option>
				<option value="Preparat">Preparat</option>
				<option value="Servit">Servit</option>
			</select>
			<p>&nbsp&nbsp&nbsp&nbsp</p> 
			<select name="pagatono" style="font-size:2vw; max-width:150px;min-width:80px" 
			<?php if ($_SESSION["loggedIn"]==FALSE) {
				echo "disabled";
			} ?>>
			<option value="" selected disabled hidden><?php echo $pagatono ?></option>
			<option value="1">Pagat</option>
			<option value="0">No pagat</option>
		</select>
		<p>&nbsp&nbsp&nbsp&nbsp</p>
		<?php if ($_SESSION["loggedIn"]==TRUE) {
			?><input type="submit" value="Modifica"><?php
		} ?>
		
	</div>
	<br>
</form>
<?php 
} 
?>
</body>
</html>