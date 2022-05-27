<?php
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelCreature.php"));

class ControllerCreature
{

    public static function supprime_CreatureSession()
    {
        ModelCreature::supprimeCreatureSession();
        header("Location:./index.php?controller=creature&action=getRandom");
    }

    public static function supprime_RandomSession(){
        ModelCreature::supprime_RandomSession();
        header("Location:index.php?controller=ICD&action=connexion");
    }


    public static function getRandom()
    {
        $_SESSION['random']=ModelCreature::random();
        header("Location:index.php?controller=ICD&action=connexion");
    }


    public static function supprimer()
    {
        require_once File::build_path(array("view", "header.php"));
        ModelCreature::supprimer($_GET['attribut']);
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function info()
    {
        require_once File::build_path(array("view", "header.php"));
        $tab = ModelCreature::info($_GET['attribut']);
        $_SESSION['infoCreature'] = $tab;
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function ajoutJardin()
    {
        require_once File::build_path(array("view", "header.php"));
        ModelCreature::ajoutJardin($_GET['attribut'],$_GET['enclos']);
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function supJardin()
    {
        require_once File::build_path(array("view", "header.php"));
        ModelCreature::supJardin($_GET['attribut']);
        header("Location:index.php?controller=ICD&action=connexion&enclos={$_GET['enclos']}");
    }

    public static function modNom($id){
        require_once File::build_path(array("view","header.php"));
        ModelCreature::modNom($id,$_POST['nom']);
        $_SESSION['infoCreature'][0]['nom']=$_POST['nom'];
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }
}

?>