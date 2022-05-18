<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="view/js/jquery.js"></script>
    <script src="view/js/accueil.js"></script>
    <link rel="stylesheet" href="view/CSS/index.css">
    <title><?php 
            if(isset($_SESSION['pseudo']))
            echo "Jeu de {$_SESSION['pseudo']}";
            else echo "CréAnimals";
      ?></title>
</head>
<?php
echo '<body onload="minuteur()">';
?>

<?php
  session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
  require_once 'lib/File.php';
  //require_once File::build_path(array("view","head.php"));
  require_once File::build_path(array("controller","routeur.php"));
?>
</body>

<footer>
    <div class="rarete">
        <p class="rareteTexte"> Niveaux de rareté : </p>
        <div class="bulle">
            <div class="cercle" id="cercleorange"></div>
        </div>
        <p class="rareteTexte"> > </p>
        <div class="bulle">
            <div class="cercle" id="cerclevert"></div>
        </div>
        <p class="rareteTexte"> > </p>
        <div class="bulle">
            <div class="cercle" id="cercleblanc"></div>
        </div>
    </div>
</footer>
</html>
