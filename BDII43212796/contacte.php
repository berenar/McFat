<?php
if(!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="cat">
<?php
include "head.php"
?>

<body><br>
    <div class="container">
      <div style="text-align:center">
      </div>
      <div class="row">
        <div class="column">
            <br><br><img src="imatges_web/mapa.jpeg" style="width:100%;border-radius:10px">
     </div>
     <div class="column">
      <form action="/action_page.php">
        <h3 align="center" style="font-size: 3vw;"> McFat del carrer <?php echo $_SESSION["carrer"];?></h3>
        <!-- <label align="center" for="fname"><a href="contacte.php"><?php echo $_SESSION["carrer"];?></a></label> -->
        <div align="center">
            <label for="fname">s/n locales 29-33</label> <br/>
            <label for="fname">28980 Madrid</label> <br/>
            <label for="fname">Tel.913.250.433</label> <br/><br/><br/><br/>
        </div>
        <h3 align="center" for="fname">HORIARI D'APERTURA</h3> <br/>
        <div align="center">
            <label for="fname">Dilluns  12h - 00h</label> <br/>
            <label for="fname">Dimarts  12h - 00h</label> <br/>
            <label for="fname">Dimecres  12h - 00h</label> <br/>
            <label for="fname">Dijous  12h - 00h</label> <br/>
            <label for="fname">Divendres  12h - 00h</label> <br/>
            <label for="fname">Dissabte  12h - 00h</label> <br/>
            <label for="fname">Diumenge  12h - 23h</label> <br/>
        </div>
    </form>
</div>
</div>
</div>

</body>
</html>
