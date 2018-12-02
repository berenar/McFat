<?php
if(!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php"
?>

<body>
	<h1 style="font-size: 2vw;">Per qualsevol qüestió, demana'ns ajuda</h1>
	<form action="mostraMissAjuda.php">
		<fieldset style="border-radius: 10px;width:40%">
			<legend>Missatge:</legend>
			Nom i cognom:<br>
			<input class="introtext" type="text" name="firstname"><br>
			Assumpte:<br>
			<input class="introtext" type="text" name="assumpte">
			<br>
			Missatge:<br>
			<textarea class="introtext" name="message" rows="10" cols="60">
			</textarea><br>
			<input type="submit">
		</fieldset>
	</form>
</body>
</html>
