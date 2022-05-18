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

    public static function supprimeCreatureSession()
    {

        unset($_SESSION['creature']);

    }

    public static function supprime_RandomSession()
    {
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

    public static function random()
    {
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

            $_SESSION['creature']['tete'] = $randTete;
            $_SESSION['creature']['corps'] = $randCorps;
            $_SESSION['creature']['jambes'] = $randJambe;
            $_SESSION['creature']['couleur'] = $randCouleur;
            $_SESSION['creature']['pv'] = $pv;

            self::ajouteCreature($randTete, $randCorps, $randJambe, $randCouleur, $pv);
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
        </div>
        <script>
            document.getElementById('bouttonInventaire').style.cursor = 'default';
            document.getElementById('bouttonInventaire').style.pointerEvents = 'none';
        </script>";
    }

    public static function ajouteCreature($tete, $corps, $jambe, $couleur, $pv)
    {
        $pdo = Model::getPDO();
        $id=self::genererID();

        $nomTete = $pdo->query("SELECT nomTete FROM tete WHERE idTete=$tete");
        $nomTete = $nomTete->fetch(PDO::FETCH_ASSOC);
        $nomTete = $nomTete["nomTete"];

        $nomCorps = $pdo->query("SELECT nomCorps FROM corps WHERE idCorps=$corps");
        $nomCorps = $nomCorps->fetch(PDO::FETCH_ASSOC);
        $nomCorps = $nomCorps["nomCorps"];

        $nomJambe = $pdo->query("SELECT nomJambe FROM jambe WHERE idJambe=$jambe");
        $nomJambe = $nomJambe->fetch(PDO::FETCH_ASSOC);
        $nomJambe = $nomJambe["nomJambe"];

        $_SESSION['creature']['nom'] = "{$nomTete}{$nomCorps}{$nomJambe}";

        $pdo->query("INSERT INTO creature 
        (mail, IDCreature, nom, couleur, PV, IDTete, IDCorps, IDJambe) VALUES(
                            '{$_SESSION['mail']}',
                            '{$id}',
                            '{$_SESSION['creature']['nom']}',
                            '{$_SESSION['creature']['couleur']}',
                            '{$_SESSION['creature']['pv']}',
                            '{$_SESSION['creature']['tete']}',
                            '{$_SESSION['creature']['corps']}',
                            '{$_SESSION['creature']['jambes']}')");
        $pdo->query("UPDATE joueur SET tirage=CURRENT_TIMESTAMP WHERE mail = '" . $_SESSION['mail'] . "'");
    }

    public static function genererID(){
        $pdo = Model::getPDO();
        $nbCreature = $pdo->query("SELECT COUNT(*) FROM creature WHERE mail='{$_SESSION['mail']}'");
        $nbCreature = $nbCreature->fetch(PDO::FETCH_NUM);
        if($nbCreature[0]==0){
            return 'Crea1';
        }else{
            $pdo->query("CREATE OR REPLACE VIEW IDCreatures AS SELECT IDCreature FROM creature WHERE mail='{$_SESSION['mail']}'");
            for ($i=1;$i<=$nbCreature[0];$i++){
                $id = $pdo->query("SELECT * FROM IDCreatures WHERE idCreature='Crea{$i}'");
                $id=$id->fetch();
                if($id==false){
                    $id='Crea'.$i;
                    break;
                }
                if($id==true&&$i==$nbCreature[0]){
                    $num=$nbCreature[0]+1;
                    $id='Crea'.$num;
                }
            }
            return $id;
        }
    }

    public static function modNom($id, $nom)
    {
        $pdo = Model::getPDO();
        $rep = $pdo->query("UPDATE creature SET nom='$nom' WHERE mail='{$_SESSION['mail']}' AND idCreature='$id'");
    }

    public static function afficherJardin($idEnclos)
    {
        $pdo = Model::getPDO();
        if(isset($_SESSION['mail'])){
            $rep = $pdo->query("SELECT * FROM creature WHERE mail ='{$_SESSION['mail']}' AND idEnclos='$idEnclos'");
            $rep->setFetchMode(PDO::FETCH_ASSOC);
            $tab = $rep->fetchAll();
            if($tab!=false){
                $dir_img = "view/images/";
                for($i=0;$i<sizeof($tab);$i++){
                    $crea = "<div class='boxCreature'>
                    <a class='inventaire_creature'>
                        <img src='{$dir_img}tetes/{$tab[$i]['IDTete']}.png' class='tete' />
                        <img src='{$dir_img}corps/{$tab[$i]['IDCorps']}.png' class='corps'/>
                        <img src='{$dir_img}jambes/{$tab[$i]['IDJambe']}.png' class='jambes'/>
                    </a>
                    <a href='index.php?controller=creature&action=supJardin&attribut={$tab[$i]['IDCreature']}&enclos=$idEnclos'>
                        <div class='supprimerCreature'> </div></a>
                    </div>";
                    $_SESSION['jardin']["{$tab[$i]['IDCreature']}"] = $crea;
                }
            }
        }
    }

    public static function ajoutJardin($id,$idEnclos)
    {
        /* Ajout bdd*/
        $pdo = Model::getPDO();
        $rep=$pdo->query("SELECT COUNT(*) FROM creature WHERE mail ='{$_SESSION['mail']}'AND idEnclos = '$idEnclos'");
        $nb=$rep->fetchAll(PDO::FETCH_NUM);
        if($nb[0][0]<4){
            $pdo->query("UPDATE creature set idEnclos = '$idEnclos' WHERE mail ='{$_SESSION['mail']}'AND IDCreature='$id'");
        }
    }

    public static function supJardin($id)
    {
        /* Ajout bdd*/
        $pdo = Model::getPDO();
        $pdo->query("UPDATE creature set idEnclos = 0 WHERE mail ='{$_SESSION['mail']}'AND IDCreature='$id'");
    
    }

}


?>