<?php

if(!isset($_GET['controller'])||!isset($_GET['action'])){
    require_once File::build_path(array("view","home.php"));
}else{
    $controller=$_GET['controller'];
    $action = $_GET['action'];
    
    if ($controller=='joueur') {
        require_once File::build_path(array("controller","ControllerJoueur.php"));
        ControllerJoueur::$action();
     }
    else if($controller=='ICD') {
        require_once File::build_path(array("controller","ControllerICD.php"));//Inscription/Connexion/Deconnexion
        ControllerICD::$action();
    }else if($controller=='creature'){
        require_once File::build_path(array("controller","ControllerCreature.php"));
        if(isset($_GET['attribut'])){
            $attrbut=$_GET['attribut'];
            ControllerCreature::$action($attrbut);
        }
        else ControllerCreature::$action();
    }
}


?>