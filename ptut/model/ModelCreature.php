<?php
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelCreature.php"));

class ModelCreature
{
    private $mail;
    private $IDCreature;
    private $nom;
    private $couleur;
    private $PV;
    private $IDTete;
    private $IDCorps;
    private $IDJambe;

    public function getNom()
    {
        return $this->nom;
    }

    public function getIDCreature()
    {
        return $this->IDCreature;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getIDTete()
    {
        return $this->IDTete;
    }

    public function getIDJambe()
    {
        return $this->IDJambe;
    }

    public function getIDCorps()
    {
        return $this->IDCorps;
    }

    public function __construct($IDCreature = NULL, $mail = NULL, $nom = NULL, $couleur = NULL, $PV = NULL, $IDTete = null, $IDCorps = null, $IDJambe = NULL)
    {
        if (!is_null($IDCreature) && !is_null($mail) && !is_null($nom) && !is_null($couleur) && !is_null($PV) && !is_null($IDTete) && !is_null($IDCorps) && !is_null($IDJambe)) {
            $this->IDCreature = $IDCreature;
            $this->mail = $mail;
            $this->nom = $nom;
            $this->couleur = $couleur;
            $this->IDTete = $IDTete;
            $this->IDJambe = $IDJambe;
            $this->IDCorps = $IDCorps;
        }

    }

    public static function supprimeCreatureSession(){

        unset($_SESSION['creature']);

    }
    
    public static function supprime_RandomSession(){
        unset($_SESSION['random']);
    }

    public static function supprimer($id)
    {
        $pdo = Model::getPDO();
        $pdo->query("DELETE FROM creature WHERE mail='{$_SESSION['mail']}' AND idCreature='$id'");
    }

    public static function info($id)
    {
        $pdo = Model::getPDO();
        $rep = $pdo->query("SELECT * FROM creature WHERE mail='{$_SESSION['mail']}' AND idCreature='$id'");
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $rep->fetchAll();
        return $tab;
    }

    public static function ajoutJardin($id){
        $tab = self::info($id)[0];
        $dir_img = "view/images/";
        $crea = "<div class='inventaire_creature'>
        <img src='{$dir_img}tetes/{$tab['IDTete']}.png' class='tete' />
        <img src='{$dir_img}corps/{$tab['IDCorps']}.png' class='corps'/>
        <img src='{$dir_img}jambes/{$tab['IDJambe']}.png' class='jambes'/>
        </div>";
        if (!isset($_SESSION['jardin'])) {
            $_SESSION['jardin'] = array(
                "{$tab['IDCreature']}" => $crea
            );
        } else {
            $_SESSION['jardin']["{$tab['IDTete']}"] = $crea;
        }
    }

    public static function random()
    {
        //random couleur selon la rareté

        if (!isset($_SESSION['creature']['tete'])) {
            $randCouleur = rand(1, 100);
            if ($randCouleur <= 5) $randCouleur = "orange";
            else if ($randCouleur <= 30 && $randCouleur > 5) $randCouleur = "green";
            elseif ($randCouleur > 30) $randCouleur = "white";

            $pdo = Model::getPDO();
            $nbligne = $pdo->query("SELECT COUNT(IDTete) FROM tete");
            $nbligne = $nbligne->fetch(PDO::FETCH_ASSOC);
            $nb = $nbligne["COUNT(IDTete)"];

            //random tete
            $randTete = rand(1, $nb);
            //random corps selon la rareté
            $randCorps = rand(1, 100);
            if ($randCorps <= 30) {
                $randCorps = $randTete;
            } else {
                do {
                    $randCorps = rand(1, $nb);
                } while ($randCorps == $randTete);
            }
            //random jambe selon la rareté
            $randJambe = rand(1, 100);
            if ($randJambe <= 30) {
                $randJambe = $randTete;
            } else {
                do {
                    $randJambe = rand(1, $nb);
                } while ($randJambe == $randTete);
            }
            //random PV
            $pv = rand(10, 200);

            $_SESSION['creature']['tete']=$randTete;
            $_SESSION['creature']['corps']=$randCorps;
            $_SESSION['creature']['jambes']=$randJambe;
            $_SESSION['creature']['couleur']=$randCouleur;


            $nomCreature = self::ajouteCreature($randTete, $randCorps, $randJambe, $randCouleur, $pv);

            $_SESSION['creature']['nom']=$nomCreature;
        }

        $dir_img = "view/images/";
        return "
        <div class='modal' id='modal'>
        <div class='modal-header'>
            <button class='button-close-modal'><a href='index.php?controller=creature&action=supprime_RandomSession'>X</a></button>
            <h2>Random créature</h2>
        </div>
            <div class='modal-content'>
                <div class='creature'>
                <p style='color: {$_SESSION['creature']['couleur']};'>{$_SESSION['creature']['nom']}</p>
                <img src='{$dir_img}tetes/{$_SESSION['creature']['tete']}.png' class='tete' />
                <img src='{$dir_img}corps/{$_SESSION['creature']['corps']}.png' class='corps'/>
                <img src='{$dir_img}jambes/{$_SESSION['creature']['jambes']}.png' class='jambes'/>
                </div>
            </div>
        </div>";

    }

    public static function ajouteCreature($tete, $corps, $jambe, $couleur, $pv)
    {
        $pdo = Model::getPDO();
        $nbCreature = $pdo->query("SELECT COUNT(*) FROM creature WHERE mail='{$_SESSION['mail']}'");
        $nbCreature = $nbCreature->fetch(PDO::FETCH_ASSOC);
        $nbCreature = $nbCreature["COUNT(*)"]++;
        $nomTete = $pdo->query("SELECT nomTete FROM tete WHERE idTete=$tete");
        $nomTete = $nomTete->fetch(PDO::FETCH_ASSOC);
        $nomTete = $nomTete["nomTete"];
        $nomCorps = $pdo->query("SELECT nomCorps FROM corps WHERE idCorps=$corps");
        $nomCorps = $nomCorps->fetch(PDO::FETCH_ASSOC);
        $nomCorps = $nomCorps["nomCorps"];
        $nomJambe = $pdo->query("SELECT nomJambe FROM jambe WHERE idJambe=$jambe");
        $nomJambe = $nomJambe->fetch(PDO::FETCH_ASSOC);
        $nomJambe = $nomJambe["nomJambe"];
        $nomCreature = "{$nomTete}{$nomCorps}{$nomJambe}";
        $pdo->query("INSERT INTO creature VALUES('{$_SESSION['mail']}','Crea{$nbCreature}','$nomCreature', '$couleur',$pv,$tete,$corps,$jambe)");
        $pdo->query("UPDATE joueur SET tirage=CURRENT_TIMESTAMP WHERE mail = '" . $_SESSION['mail'] . "'");
        return $nomCreature;
    }

    public static function modNom($id,$nom){
        $pdo = Model::getPDO();
        $rep = $pdo->query("UPDATE creature SET nom='$nom' WHERE mail='{$_SESSION['mail']}' AND idCreature='$id'");
    }
}

?>