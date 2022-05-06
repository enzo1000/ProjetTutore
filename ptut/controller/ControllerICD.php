<?php
require_once File::build_path(array("model","Model.php"));
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

class ControllerICD{
   public static function formInscription(){
       require File::build_path(array("view","formulaires","formInscription.php"));
   }

   public static function formConnexion(){
        require File::build_path(array("view","formulaires","formConnexion.php"));
   }

   public static function connexion(){
    require_once File::build_path(array("model","ModelJoueur.php"));
    try {
        $sql = "SELECT * FROM joueur WHERE mail=:value1 AND mdp=:value2";
        $requete = Model::getPDO()->prepare($sql);
        if(isset($_POST['mail'])&&isset($_POST['mdp'])){
            $values = array(
                "value1" => $_POST['mail'],
                "value2" => $_POST['mdp'],
            );
        }
        else if(isset($_SESSION['mail'])&&isset($_SESSION['mdp'])){
                $values = array(
                    "value1" => $_SESSION['mail'],
                    "value2" => $_SESSION['mdp'],
                );
        }
        
        $requete->execute($values);
        //$requete->setFetchMode(PDO::FETCH_CLASS, 'ModelJoueur');
        $reponse = $requete->fetchAll();
       
        if ($reponse == false) {
            echo "mdp ou mail incorrect";
            self::formConnexion();
            echo "<a href='index.php?controller=ICD&action=formInscription'> pas de compte ? créer un compte mtn</a>";
        } else {
            // echo "<pre>";
            //var_dump($reponse) ;
            $_SESSION['joueur']=$reponse[0];
            $_SESSION['pseudo']=$reponse[0]['pseudo'];
            //var_dump($_SESSION['pseudo']);
            $_SESSION['mail']=$reponse[0]['mail'];
            $_SESSION['mdp']=$reponse[0]['mdp'];
            //var_dump($_SESSION['mail']);
            require_once File::build_path(array("view","header.php"));
            require_once File::build_path(array("view","accueil.php"));
            // header("Location:view/accueil.php");
    
            /*
            $sql = "SELECT mail FROM admin WHERE mail='{$_POST['mail']}'";
            $requete=$conn->query($sql);
            if($reponse!=false){
                echo "<a href='admin.php'> gérer les créatures </a>";
            }*/
        }
    }
    catch(PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue, <a href="index.php"> retour a la page d\'accueil </a>';
        }
        die();
    }

   }

   public static function inscription(){
    if($_POST['mdp']!=$_POST['mdp2']){
        echo "<p>deux mdp non identiques, veuillez resaisir <p>
              <div></div>
              <div></div>";
        self::formInscription();
      }
      else{
            $sql = "SELECT COUNT(*) FROM joueur WHERE mail=:value1";
            $requete = Model::getPDO()->prepare($sql);
            $values = array(
                "value1" => $_POST['mail']
            );
            $requete->execute($values);
            $reponse=$requete->fetch(PDO::FETCH_NUM);
            if($reponse[0]!=0){
                echo "Ce mail a déjà été utilisée";
                self::formInscription();
            }else{
              $newCompte="INSERT INTO joueur(mail, pseudo, mdp) VALUES (:value1,:value2,:value3)";
              $requete = Model::getPDO()->prepare($newCompte);
                $values = array(
                    "value1" => $_POST['mail'],
                    "value2" => $_POST['pseudo'],
                    "value3" => $_POST['mdp'],
                );
              $requete->execute($values);
              echo "Bienvenue !".$_POST['pseudo'];
              echo "<a href='index.php?controller=ICD&action=formConnexion'> cliquez ici pour se connecter</a>";
            }
        }  
    }

   public static function deconnexion(){
        session_destroy();
        unset($_SESSION);
        header("Location:index.php");
   }
}

?>