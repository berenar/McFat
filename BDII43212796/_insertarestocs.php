<?php
if(!isset($_SESSION)) {session_start();}

for ($restaurant=1; $restaurant <6 ; $restaurant++) {
	$article=1;
	insertEst($restaurant,$article);
	$article=3;
	insertEst($restaurant,$article);
	$article=4;
	insertEst($restaurant,$article);
	$article=13;
	insertEst($restaurant,$article);
	$article=14;
	insertEst($restaurant,$article);
	$article=16;
	insertEst($restaurant,$article);
	$article=17;
	insertEst($restaurant,$article);
	$article=18;
	insertEst($restaurant,$article);
}

function insertEst($rest,$art){
	$con=mysqli_connect("localhost","root","","BDII43212796");
	$query="INSERT INTO ESTOC (numEst,id_restaurant,id_element) 
	VALUES (100,$rest,$art)";
	$resultat=mysqli_query($con,$query);
}
?>