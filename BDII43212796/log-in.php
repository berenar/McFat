<?php

if(!isset($_SESSION)) {session_start();}

// Connect to server and select databse.
$con=mysqli_connect("localhost","root","","BDII43212796");

$uname = $_POST['uname'];
$psw = $_POST['psw'];

$query= "SELECT * FROM Treballador WHERE nomUsuari= '".$uname."'
AND contrasenya= '$psw'";

echo "estam provant de fer un:     ".$query;

$resultat=mysqli_query($con,$query);
$existe= mysqli_num_rows($resultat);
echo "existe: ".$existe;
mysqli_close($con);

// If result matched $username and $password, table row must be 1 row
if($existe==1){
  session_start();
  $_SESSION['loggedIn'] = true;
  $_SESSION['username'] = $uname;
  header("LOCATION: ./benvinguda.php");
  $_SESSION['misserror'] = "0";
}else{
  $_SESSION['misserror'] = "Invalid username or password";
  header("LOCATION: ./index.php");
}
?>
