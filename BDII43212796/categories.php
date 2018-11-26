<?php
if(!isset($_SESSION)) {session_start();}
$con = mysqli_connect("localhost","root","","BDII43212796");
$queryC = "SELECT * FROM Categoria";
$resultatC = mysqli_query($con,$queryC);
$numfilesC = mysqli_num_rows($resultatC);
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

<body>
  <div class="row" align="center" style="padding: 3vw">
    <?php
    if ($numfilesC>0) {
      while ($filaC=mysqli_fetch_array($resultatC)) {
        ?>
        <div class="col-sm-4" style="border:1px solid black">
          <form action="mostra_cat.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $filaC["id_categoria"] ?>">
            <input type="image" style="max-height: 150px; max-width: 200px;" 
            src="<?php echo $filaC['fotoCat'] ?>">
          </form>         
        </div>
        <?php
      }
    }
    ?>

  </div>

</body>
</html>
