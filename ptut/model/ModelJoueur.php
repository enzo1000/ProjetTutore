<?php
require_once File::build_path(array("model","Model.php"));

class ModelJoueur{
    private $mail;
    private $pseudo;
    private $mdp;
    private $tirage;

    public function __construct($m=NULL, $p=NULL, $mdp=NULL, $tirage=NULL)
    {
        if(!is_null($m) && !is_null($p) && !is_null($mdp) && !is_null($tirage)){
             $this->mail = $m;
            $this->pseudo = $p;
            $this->mdp = $mdp;
            $this->tirage = $tirage;
        }
           
    }

    public function getAllCreatures(){
        try{
          require_once File::build_path(array("model","ModelCreature.php"));
            $pdo = Model::getPDO();
            $rep=$pdo->query("SELECT * FROM creature WHERE mail='$this->mail'");
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

    public static function tri($critere){
      $pdo = Model::getPDO();
      require_once File::build_path(array("model","ModelCreature.php"));
            $rep=$pdo->query("SELECT * FROM creature WHERE mail='{$_SESSION['mail']}' AND couleur=$critere");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCreature');
            $tab = $rep->fetchAll();
            return $tab;
    }

    public static function afficherInfoJoueur(){
        try{
            $pdo = Model::getPDO();
            $rep=$pdo->query("SELECT tirage FROM joueur WHERE mail='{$_SESSION['mail']}'");
            $date = $rep->fetchAll();
            
            $rep=$pdo->query("SELECT COUNT(*) FROM creature WHERE mail='{$_SESSION['mail']}'");
            $nbCreature=$rep->fetchAll(PDO::FETCH_NUM);

            return "
            <div id='avatar'><img src='view/images/utilisateur/utilisateur.png'></div>
            <div>{$_SESSION['pseudo']}</div>
            <div>Dresseur depuis {$date[0]['tirage']} </div>
            <div>{$nbCreature[0][0]} créatures collectionnées</div>";
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

    /**
     * @return mixed|null
     */
    public function getTirage()
    {
        return $this->tirage;
    }




}
?>