<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once '../model/ModelJoueur.php';
require_once '../model/ModelCreature.php';
echo "<pre>";

class ControllerJoueur{
    
    public static function getJoueur(){
        $m=$_SESSION['joueur'][0]["mail"];
        $mdp=$_SESSION['joueur'][0]["mdp"];
        $pseudo=$_SESSION['joueur'][0]["pseudo"];
        $joueur=new ModelJoueur($m, $pseudo, $mdp);
        return $joueur;
    }

    public static function readAllCreatures(){
        $tab_c=self::getJoueur()->getAllCreatures();
        //echo "<pre>";
        //var_dump($tab_c);
        foreach($tab_c as $IDcreature){
            $dir_img = "../view/images/";
            echo "<div class='creature'>";
                    echo "<img src=" . $dir_img . "tetes/" . $IDcreature->getIDTete() . ".png " . " class='tete'/>";
                    echo "<img src=" . $dir_img . "corps/" . $IDcreature->getIdCorps() . ".png " . " class='corps'/>";
                    echo "<img src=" . $dir_img . "jambes/" . $IDcreature->getIdJambe() . ".png " . " class='jambes'/>";
                    echo "</div>";
        }
    }
}

?>