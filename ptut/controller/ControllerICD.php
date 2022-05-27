<?php
require_once File::build_path(array("model","Model.php"));
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once File::build_path(array("model", "ModelICD.php"));
require_once File::build_path(array("model", "ModelCreature.php"));

class ControllerICD{
   public static function formInscription(){
       require File::build_path(array("view","formulaires","formInscription.php"));
   }

   public static function formConnexion(){
        require File::build_path(array("view","formulaires","formConnexion.php"));
   }

   public static function connexion(){
    require_once File::build_path(array("model","ModelJoueur.php"));
     $reponse = ModelICD::connexion();
       
        if ($reponse == false) {
            self::formConnexion();
            echo "<div class='errorMessage'>Mot de passe ou mail incorrect</div>";

        } else {
            $_SESSION['joueur']=$reponse[0];
            $_SESSION['pseudo']=$reponse[0]['pseudo'];
            $_SESSION['mail']=$reponse[0]['mail'];
            $_SESSION['mdp']=$reponse[0]['mdp'];
            if(isset($_SESSION['jardin'])){
                unset($_SESSION['jardin']);
            }
            if(isset($_GET['enclos'])){
                ModelCreature::afficherJardin($_GET['enclos']);
                $_SESSION['idEnclos']=$_GET['enclos'];
            }else{
                ModelCreature::afficherJardin(1);
                $_SESSION['idEnclos']=1;
            } 
        
            require_once File::build_path(array("view","header.php"));
            require_once File::build_path(array("view","accueil.php"));
        }

   }

   public static function inscription(){
    if($_POST['mdp']!=$_POST['mdp2']){
        self::formInscription();
        echo "<div class='errorMessage'>Les deux mot de passe ne sont pas identiques, veuillez ressaisir </div>>";
      }
      else{
            $reponse=ModelICD::verifieInscription();
            if($reponse!=0){
                self::formInscription();
                echo "<div class='errorMessage'>Ce mail a déjà été utilisé, merci dans choisir un autre ou de vous connecter</div>";
            }else{
              ModelICD::inscription();
              //echo "Bienvenue !".$_POST['pseudo'];
              //echo "<a href='index.php?controller=ICD&action=formConnexion'> cliquez ici pour se connecter</a>";
              self::connexion();
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