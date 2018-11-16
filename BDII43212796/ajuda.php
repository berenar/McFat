<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php"
?>


<body>
	<h1>Per qualsevol qüestió, contacta'ns</h1>
	<form action="envia_correu_ajuda.php">
		<fieldset style="border-radius: 10px">
			<legend>Missatge:</legend>
			Nom s'usuari:<br>
			<input class="introtext" type="text" name="firstname" value="$_SESSION[username]" readonly style="color: grey"><br>
			Assumpte:<br>
			<input class="introtext" type="text" name="assumpte">
			<br>
			Missatge:<br>
			<textarea class="introtext" name="message" rows="10" cols="60"></textarea><br>
			<input class="submit" type="submit" value="Envia">
		</fieldset>
	</form>
</body>
</html>