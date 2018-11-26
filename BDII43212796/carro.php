<?php
if(!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php";
$con=mysqli_connect("localhost","root","","BDII43212796");
$preuCarro=0;
?>

<body>
  <h2 style="font-size: 3vw" style:align="left">Articles i menús al teu carro</h2>
  <?php
  if (!empty($_SESSION["ids_comanda"])) {
    $array=$_SESSION["ids_comanda"];
    foreach ($array as $id_carro) {
      // per saber si es un menú
      $queryM="SELECT * FROM Menu WHERE id_menu = $id_carro";
      $resultatM=mysqli_query($con,$queryM);
      $filaM = mysqli_fetch_array($resultatM);
      if (mysqli_num_rows($resultatM)>0) {
        // és un menú
        $queryM="SELECT Element.nomElem,Menu.preuMenu FROM Element JOIN Menu WHERE id_element = $id_carro";
        $resultatM=mysqli_query($con,$queryM);
        $filaM = mysqli_fetch_array($resultatM);
        $preuCarro=$preuCarro+$filaM["preuMenu"];
        ?>
        <div class=mateixaLinia>
          <?php 
          echo "<h3>".$filaM["nomElem"]." (".$filaM["preuMenu"]."€)"."</h3>";
          ?>
          <form action="llevar_producte.php" method="POST" style="display: inline-block;">
            <input class= "button-esborra" type="submit" value="Esborra">
            <input type="hidden" name="id" value="<?php echo $id_carro ?>">
          </form>
        </div>
        <?php 
        $queryArticlesMenu="SELECT nomElem FROM menu JOIN r_menu_article on
        id_menu=id_elementM JOIN article ON id_elementA=id_article JOIN
        element on id_article=id_element WHERE id_menu=$id_carro";
        $resultatAM=mysqli_query($con,$queryArticlesMenu);
        $numfilesAM=mysqli_num_rows($resultatAM);
        if ($numfilesAM>0){
          while ($filaAM=mysqli_fetch_array($resultatAM)) {
            ?>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "·".$filaAM["nomElem"] ?></p>
            <?php
          }
        }
      }else{
        // és un article
        $queryE="SELECT Element.nomElem,Article.preuArt FROM Element JOIN Article WHERE id_element = $id_carro";
        $resultatE=mysqli_query($con,$queryE);
        $filaE = mysqli_fetch_array($resultatE);
        $preuCarro=$preuCarro+$filaE["preuArt"];
        ?>
        <div class="mateixaLinia" >
          <?php
          echo "<h3>".$filaE["nomElem"]." (".$filaE["preuArt"]."€)"."</h3>";
          ?>
          <form action="llevar_producte.php" method="POST" style="display: inline-block;">
            <input class= "button-esborra" type="submit" value="Esborra">
            <input type="hidden" name="id" value="<?php echo $id_carro ?>">
          </form>
        </div>
        <?php 
      }
    }
    // mostrar preu total i el botó per comprar
    ?>
    <hr width="40%" align="left">
    <h2>Total:&nbsp;&nbsp;<?php echo $preuCarro;?>€</h2>
    <form action="crea_comanda" method="POST">
      <input class= "button-compra" type="submit" value="Compra">
    </form>
    <?php 
  }else{
    ?>
    <h2 style="font-size: 2vw" style:align="left">No tens res al teu carro!</h2>
    <a href="productes.php"><h3>No tens gana?</h3></a>


    <?php
  }
  ?>
</body>
</html>
