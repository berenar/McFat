<?php
if(!isset($_SESSION)) {session_start();}
$id=$_POST["id"];
$con=mysqli_connect("localhost","root","","BDII43212796");
$queryA="SELECT * FROM Element JOIN Article ON id_categoria=".$_POST["id"]." AND id_element=id_article";
$resultatA=mysqli_query($con,$queryA);
$numfilesA=mysqli_num_rows($resultatA);

$queryC="SELECT nomCat FROM Categoria WHERE id_categoria=".$_POST["id"];
$resultatC=mysqli_query($con,$queryC);
$resultatC=mysqli_fetch_array($resultatC);
$nomCat=$resultatC["nomCat"];
?>
<!DOCTYPE html>
<html lang="cat">
<!-- bootstrap interfereix en el padding del head -->
<div style="padding: 8px">
  <?php
  include "head.php"
  ?>
</div>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
>

<h2 style="font-size: 3vw" style: align="center"><?php echo $nomCat ?></h2>
<!-- ARTICLES -->
<?php
if ($numfilesA>0) {
  while ( $filaA=mysqli_fetch_array($resultatA)) {
    echo "<div class=\"col-sm-3\" style=\"border:1px solid black;
    padding:2vw; border-radius:10px\">";
    echo "<h3 style=\"font-size: 2vw;\">";
    echo $filaA['nomElem'];
    echo " <br>(";
        // obtenir l'estoc d'un article al restaurant actual
    $queryE="SELECT numEst FROM Estoc JOIN Restaurant ON
    id_element=".$filaA['id_element']. " AND adreca="."'".
    $_SESSION['carrer']."'";
    $resultatE=mysqli_query($con,$queryE);
    $filaE=mysqli_fetch_array($resultatE);
    echo $filaE["numEst"];
    echo " restants)";
    echo "</h3>";
    echo "<br><div class=\"col-sm-6\">";
    ?>
    <table style="font-size:1vw">
      <tr>
        <td>kcal</td>
        <td><?php echo $filaA['kcal']; ?></td>
      </tr>
      <tr>
        <td>grams</td>
        <td><?php echo $filaA['g']; ?></td>
      </tr>
      <tr>
        <td>proteïnes</td>
        <td><?php echo $filaA['p']; ?></td>
      </tr>
    </table>
    <?php
    echo "</div>";
    echo "<div class=\"col-sm-3\">";
    echo "</div>";
    if ($filaE["numEst"]>0) {
      echo "<img  style=\"max-height: 150px; max-width: 200px;\"
      src=".$filaA['fotoArt']."><br><br>";
      ?>
      <form action="afegir_producte.php" method="POST">
        <input type="hidden" name="id"
        value="<?php echo $filaA['id_element'];?>">
        <input class= "button-preu" title="Comana" type="submit"
        value="<?php echo $filaA['preuArt']."€" ?>">
      </form>

      <?php
    }else{
      echo "<img  style=\"max-height: 150px; max-width: 200px;\" 
      src=\"imatges_web/no_stock.gif\"><br><br>";
    }

    echo "</div>";

  }
}
?>
