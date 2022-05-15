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
/*s
        echo "<script>
        
        document.getElementById('timer').style.cursor = 'default';
        document.getElementById('timer').style.pointerEvents = 'none';
        document.getElementById('bouttonInventaire').style.cursor = 'default';
        document.getElementById('bouttonInventaire').style.pointerEvents = 'none';
        </script>";*/

        
        /*require_once File::build_path(array("view", "header.php"));
        require_once File::build_path(array("view", "accueil.php"));*/
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
        ModelCreature::ajoutJardin($_GET['attribut']);
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function modNom($id){
        require_once File::build_path(array("view","header.php"));
        ModelCreature::modNom($id,$_POST['nom']);
        $_SESSION['infoCreature'][0]['nom']=$_POST['nom'];
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }
}

?>