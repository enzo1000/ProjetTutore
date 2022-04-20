<?php
  session_start();

  //session est vide mais elle existe
  session_destroy();

  //session complètement détruit
  unset($_SESSION);

  //permet de revenir su page index.php, compteur visiteur repart de 1;
  header("Location:../index.php");

?>

