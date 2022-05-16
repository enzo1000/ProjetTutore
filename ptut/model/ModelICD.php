<?php
require_once File::build_path(array("model", "Model.php"));

class ModelICD
{
    public static function connexion(){
        $sql = "SELECT * FROM joueur WHERE mail=:value1 AND mdp=:value2";
        $requete = Model::getPDO()->prepare($sql);
        if(isset($_POST['mail'])&&isset($_POST['mdp'])){
            $values = array(
                "value1" => $_POST['mail'],
                "value2" => $_POST['mdp'],
            );
            $_SESSION['jardin']=ModelCreature::afficherJardin(1);
        }
        else if(isset($_SESSION['mail'])&&isset($_SESSION['mdp'])){
                $values = array(
                    "value1" => $_SESSION['mail'],
                    "value2" => $_SESSION['mdp'],
                );
            
        }
        $requete->execute($values);
        //$requete->setFetchMode(PDO::FETCH_CLASS, 'ModelJoueur');
        $reponse = $requete->fetchAll();

        return $reponse;
    }

    public static function verifieInscription(){
        $sql = "SELECT COUNT(*) FROM joueur WHERE mail=:value1";
        $requete = Model::getPDO()->prepare($sql);
        $values = array(
            "value1" => $_POST['mail']
        );
        $requete->execute($values);
        $reponse=$requete->fetch(PDO::FETCH_NUM);
        return $reponse[0];
    }

    public static function inscription(){
        $newCompte="INSERT INTO joueur(mail, pseudo, mdp) VALUES (:value1,:value2,:value3)";
        $requete = Model::getPDO()->prepare($newCompte);
          $values = array(
              "value1" => $_POST['mail'],
              "value2" => $_POST['pseudo'],
              "value3" => $_POST['mdp'],
          );
        $requete->execute($values);
    }
}