<?php
require_once '../model/ModelJoueur.php';
/*
require_once '../lib/File.php';
require_once (File::build_path(array("model","Model.php")));
require_once (File::build_path(array("model","ModelJoueur.php")));
*/

try {
    $sql = "SELECT pseudo FROM joueur WHERE mail=:value1 AND mdp=:value2";
    $requete = Model::getPDO()->prepare($sql);
    $values = array(
        "value1" => $_POST['mail'],
        "value2" => $_POST['mdp'],
    );
    $requete->execute($values);
    $reponse = $requete->fetch(PDO::FETCH_NUM);
    if ($reponse == false) {
    echo 'coucou je suis laaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        require "formConnexion.php";
        echo "<a href='formInscription.php'> pas de compte ? créer un compte mtn</a>";
    } else {
        $_SESSION['pseudo']=$reponse[0];
        $sql = "SELECT * FROM joueur WHERE mail=:value1";
        $values = array(
            "value1" => $_POST['mail']
        );
        $requete_joueur = Model::getPDO()->prepare($sql);
        $requete_joueur->execute($values);
        //$requete_joueur->setFetchMode(PDO::FETCH_CLASS, 'ModelJoueur');
        $joueur=$requete_joueur->fetchAll();
        /*$joueur=$requete_joueur->fetchAll();
        echo "<pre>";
        var_dump($joueur);*/
        $_SESSION['joueur']=$joueur;
        echo "<pre>";
        var_dump($joueur);
        var_dump( $_SESSION);
        
        //$_SESSION['mail']=$joueur[0]['mail'];
        //header("Location:../view/accueil.php");

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
        echo 'Une erreur est survenue, <a href="http://localhost/Prog%20Web/td-php/TD3/"> retour a la page d\'accueil </a>';
    }
    die();
}
?>