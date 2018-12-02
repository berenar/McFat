<?php
if(!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php"
?>

<body><br>
	<div class="container" style="width: 50%">
		<div style="text-align:center">
			<h2>Contacta'ns</h2>
		</div>
		<form action="ajuda.php">
			<label for="fname">Nom</label>
			<input type="text" id="fname" name="firstname" placeholder="El teu nom..">
			<label for="lname">Cognom</label>
			<input type="text" id="lname" name="lastname" placeholder="El teu cognom..">
			<label for="country">País</label>
			<select id="country" name="country">
				<option value="australia">Espanya</option>
				<option value="canada">Portugal</option>
				<option value="usa">Francia</option>
			</select>
			<label for="subject">Motiu</label>
			<textarea id="subject" name="subject" placeholder="Escriu.." style="height:170px"></textarea>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>
</div>

</body>
</html>
