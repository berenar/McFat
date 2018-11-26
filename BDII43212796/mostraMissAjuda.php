<?php
if(!isset($_SESSION)) {session_start();}
$_SESSION['misserror'] = "Missatge enviat exitosament";
header("LOCATION: ./ajuda.php");
?>
