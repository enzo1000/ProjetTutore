<?php
session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

if($_POST['mdp']!=$_POST['mdp2']){
  echo "<p>deux mdp non identiques, veuillez resaisir <p>
        <div></div>
        <div></div>";
  require "formInscription.php";
}
else{
  require_once "../model/Model.php";
      $sql = "SELECT COUNT(*) FROM joueur WHERE mail=:value1";
      $requete = Model::getPDO()->prepare($sql);
        $values = array(
        "value1" => $_POST['mail']
        );
      $requete->execute($values);
      $reponse=$requete->fetch(PDO::FETCH_NUM);
      if($reponse[0]!=0){
          echo "Ce mail a déjà été utilisée";
          require "formInscription.php";
      }
      else{
        $newCompte="INSERT INTO joueur(mail, pseudo, mdp) VALUES (:value1,:value2,:value3)";
        $requete = Model::getPDO()->prepare($newCompte);
          $values = array(
              "value1" => $_POST['mail'],
              "value2" => $_POST['pseudo'],
              "value3" => $_POST['mdp'],
          );
        $requete->execute($values);
        echo "Bienvenue !".$_POST['pseudo'];
        echo "<a href='formConnexion.php'> cliquez ici pour se connecter</a>";
      }
}
?>