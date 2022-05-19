<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="view/js/jquery.js"></script>
    <script src="view/js/accueil.js"></script>
    <link rel="stylesheet" href="view/CSS/index.css">
    <title><?php
        if (isset($_SESSION['pseudo']))
            echo "Jeu de {$_SESSION['pseudo']}";
        else echo "CréAnimals";
        ?></title>
</head>

<?php
echo '<body onload="minuteur()">';

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'lib/File.php';
//require_once File::build_path(array("view","head.php"));
require_once File::build_path(array("controller", "routeur.php"));

echo "</body>";

require_once File::build_path(array("view", "footer.php"))
?>


</html>
