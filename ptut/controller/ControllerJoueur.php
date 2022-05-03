<?php
require_once File::build_path(array("model","ModelJoueur.php"));
require_once File::build_path(array("model","ModelCreature.php"));

//require_once '../model/ModelJoueur.php';
//require_once '../model/ModelCreature.php';
//session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class ControllerJoueur{
    
    public static function getJoueur(){
        //echo "<pre>";
        //var_dump($_SESSION);
        $m=$_SESSION['joueur']["mail"];
        $mdp=$_SESSION['joueur']["mdp"];
        $pseudo=$_SESSION['joueur']["pseudo"];
        $joueur=new ModelJoueur($m, $pseudo, $mdp);
        return $joueur;
    }


    public static function readAllCreatures(){
      
        $tab_c=self::getJoueur()->getAllCreatures();
        //$tab_c=$_SESSION['joueur']->getAllCreatures();
        //echo "<pre>";
        //var_dump($tab_c);
        foreach($tab_c as $IDcreature){
            $dir_img = "view/images/";
            echo "<div class='creature'>";
                    echo "<img src=" . $dir_img . "tetes/" . $IDcreature->getIDTete() . ".png " . " class='tete'/>";
                    echo "<img src=" . $dir_img . "corps/" . $IDcreature->getIdCorps() . ".png " . " class='corps'/>";
                    echo "<img src=" . $dir_img . "jambes/" . $IDcreature->getIdJambe() . ".png " . " class='jambes'/>";
                    echo "</div>";
        }
    }
}

?>