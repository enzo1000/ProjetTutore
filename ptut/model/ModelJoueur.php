<?php
require_once File::build_path(array("model","Model.php"));

class ModelJoueur{
    private $mail;
    private $pseudo;
    private $mdp;

    public function __construct($m=NULL, $p=NULL, $mdp=NULL)
    {
        if(!is_null($m) && !is_null($p) && !is_null($mdp)){
             $this->mail = $m;
            $this->pseudo = $p;
            $this->mdp = $mdp;
        }
           
    }

    public function getAllCreatures(){
        try{
          require_once File::build_path(array("model","ModelCreature.php"));
            $pdo = Model::getPDO();
            
            $rep=$pdo->query("SELECT p.IDCreature, nom, couleur, PV, IDTete, IDCorps, IDJambe 
                            FROM possede p JOIN creature c ON p.idCreature=c.idCreature WHERE mail='$this->mail'");
            
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCreature');
            $tab = $rep->fetchAll();
            return $tab;
        }
        catch(PDOException $e) {
            if (Conf::getDebug()) {
              echo $e->getMessage();
            } else {
              echo 'Une erreur est survenue, retour a la page d\'accueil </a>';
            }
            die();
          }
    }

    public function afficherInfoJoueur(){
        try{
            $pdo = Model::getPDO();
            $rep=$pdo->query("SELECT * FROM joueur WHERE mail=$this->mail");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelJoueur');
            $tab = $rep->fetchAll();
            return $tab;
        }
        catch(PDOException $e) {
            if (Conf::getDebug()) {
              echo $e->getMessage();
            } else {
              echo 'Une erreur est survenue, retour a la page d\'accueil </a>';
            }
            die();
          }
    }
    public function get($attribut){
        return $this->$attribut;
    }


}
?>