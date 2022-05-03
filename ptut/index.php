<?php
  session_start();
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once 'lib/File.php';
  require_once File::build_path(array("controller","routeur.php"));

  
  //require_once File::build_path(array("model","modelJoueur.php"));
  // require_once 'controller/routeur.php';
  /*
<html>
  <head>
    <meta charset="UTF-8">
    <title>JEU</title>
</head>
  <p>Bienvenue sur PiocherPokemon</p>

  <div><a href='formulaires/formInscription.php'>cliquez ici pour créer un compte</a>
    </div>
    <div>
  <a href='formulaires/formConnexion.php'> cliquez ici pour se connecter</a>
    </div>

</html>
*/
?>


