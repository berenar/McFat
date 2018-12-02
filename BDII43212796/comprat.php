<?php
if(!isset($_SESSION)) {session_start();}
unset($_SESSION["ids_comanda"]);

header("LOCATION: ./comandes.php");
?>