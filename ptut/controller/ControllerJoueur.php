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
        $tirage=$_SESSION['joueur']['tirage'];
        $joueur=new ModelJoueur($m, $pseudo, $mdp,$tirage);
        return $joueur;
    }


    public static function readAllCreatures(){
        require_once File::build_path(array("view","header.php"));
        
        $tab_c=self::getJoueur()->getAllCreatures();
        //$tab_c=$_SESSION['joueur']->getAllCreatures();
        //echo "<pre>";
        //var_dump($tab_c);
        require_once File::build_path(array("view","inventaire.php"));
        
        // require_once File::build_path(array("view","accueil.php"));
    }
}

?>