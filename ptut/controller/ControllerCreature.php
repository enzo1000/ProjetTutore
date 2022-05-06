<?php
require_once File::build_path(array("model","Model.php"));
require_once File::build_path(array("model","ModelCreature.php"));
class ControllerCreature{
    public static function getRandom(){
        require_once File::build_path(array("view","header.php"));
        require_once File::build_path(array("view","accueil.php"));
        echo "
            <div id='modal' class='modal'>
                <div class='modal-header'>
                    <a class='closebtn' href='index.php?controller=ICD&action=connexion' class='closebtn' onclick='document.location.reload(true)'>×</a>
                    <h2>Random créature</h2>
                </div>
            <div class='modal-content'>";
        ModelCreature::random();
        echo "</div>";
    }
    
    public static function supprimer(){
        require_once File::build_path(array("view","header.php"));
        ModelCreature::supprimer($_GET['attribut']);
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function info(){
        require_once File::build_path(array("view","header.php"));
        $tab=ModelCreature::info($_GET['attribut']);
        $_SESSION['infoCreature']=$tab;
        echo "<pre>";
        var_dump($_SESSION['infoCreature']);
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }

    public static function ajoutJardin(){
        require_once File::build_path(array("view","header.php"));
        $tab=ModelCreature::info($_GET['attribut'])[0];
        $dir_img = "view/images/";
        $crea="<div class='inventaire_creature'>
        <img src='{$dir_img}tetes/{$tab['IDTete']}.png' class='tete' />
        <img src='{$dir_img}corps/{$tab['IDCorps']}.png' class='corps'/>
        <img src='{$dir_img}jambes/{$tab['IDJambe']}.png' class='jambes'/>
        </div>";
        if(!isset($_SESSION['jardin'])){
            $_SESSION['jardin']=array(
                "{$tab['IDCreature']}"=>$crea
            );
        }else{
            $_SESSION['jardin']["{$tab['IDTete']}"]=$crea;
        } 
        header("Location:index.php?controller=joueur&action=readAllCreatures");
    }
   

}
?>