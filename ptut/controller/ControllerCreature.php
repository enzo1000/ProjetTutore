<?php
require_once File::build_path(array("model","Model.php"));
class ControllerCreature{
    public static function getRandom(){
        require_once File::build_path(array("model","ModelCreature.php"));
        ModelCreature::random();
        //$_SESSION["r"]=ModelCreature::random();
        //header("location:".  $_SERVER['HTTP_REFERER']); 

        //echo ModelCreature::random();
        //echo File::build_path(array("index.php"))."?controller=ICD&action=connexion";
        //header("Location:".File::build_path(array("index.php"))."?controller=ICD&action=connexion");
    }

}
?>