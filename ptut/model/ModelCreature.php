<?php
require_once File::build_path(array("model","Model.php"));
class ModelCreature{
    private $IDCreature;
    private $nom; 
    private $couleur; 
    private $PV; 
    private $IDTete;
    private $IDCorps;
    private $IDJambe; 

    public function getIDTete(){return $this->IDTete;}
    public function getIDJambe(){return $this->IDJambe;}
    public function getIDCorps(){return $this->IDCorps;}

    public function __construct($IDCreature=NULL, $nom=NULL, $couleur=NULL,$PV=NULL,$IDTete=null,$IDCorps=null,$IDJambe=NULL )
    {
        if(!is_null($IDCreature) && !is_null($nom) && !is_null($couleur)&& !is_null($PV)&& !is_null($IDTete)&& !is_null($IDCorps)&& !is_null($IDJambe)){
            $this->IDCreature = $IDCreature;
            $this->nom = $nom;
            $this->couleur = $couleur;
            $this->IDTete=$IDTete;
            $this->IDJambe=$IDJambe;
            $this->IDCorps=$IDCorps;
        }
           
    }

    public static function random(){

        $dir_img = "view/images/";
        //random couleur selon la rareté
        $randCouleur=rand(1,100);
        if($randCouleur<=5) $randCouleur="orange";
        else if($randCouleur<=30 && $randCouleur>5) $randCouleur="green";
        elseif($randCouleur>30) $randCouleur="white";
        
        $pdo = Model::getPDO();
        $nbligne = $pdo->query("SELECT COUNT(IDTete) FROM tete");
        $nbligne = $nbligne->fetch(PDO::FETCH_ASSOC);
        $nb = $nbligne["COUNT(IDTete)"];

        //random tete
        $randTete = rand(1, $nb);
        //random corps selon la rareté
        $randCorps=rand(1,100);
        if($randCorps<=30) {
            $randCorps=$randTete;
        }else {
            do{
                $randCorps = rand(1, $nb);
            }while($randCorps==$randTete);
        }
        //random jambe selon la rareté
        $randJambe=rand(1,100);
        if($randJambe<=30) {
            $randJambe=$randTete;
        }else {
            do{
                $randJambe = rand(1, $nb);
            }while($randJambe==$randTete);
        }
        //random PV
        $pv=rand(10,200);

        $nomCreature=self::ajouteCreature($randTete,$randCorps,$randJambe,$randCouleur,$pv);

        echo "<div class='creature'>
        <p style='color: $randCouleur;'>$nomCreature</p>
        <img src='{$dir_img}tetes/{$randTete}.png' class='tete' />
        <img src='{$dir_img}corps/{$randCorps}.png' class='corps'/>
        <img src='{$dir_img}jambes/{$randJambe}.png' class='jambes'/>
        </div>";
       
        //$sql="INSERT INTO possede VALUES ('{$a}{$b}{$c}n','{$_SESSION['mail']}')";
        //$conn->query($sql);
        /*
        echo "
        <div id='id01' class='modal'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <header class='container'>
                    <a href='accueil.php' class='closebtn' onclick='document.location.reload(true)'>×</a>
                    <h2>Random créatures</h2>
                </header>
                <div class='container'>
                    <div class='creature'>
                        <img src='{$dir_img}tetes/{$a}.png' class='tete' />
                        <img src='{$dir_img}corps/{$b}.png' class='corps'/>
                        <img src='{$dir_img}jambes/{$c}.png' class='jambes'/>
                    </div>
                </div>
        </div>
    </div>";*/
   
    }

    public static function ajouteCreature($tete,$corps,$jambe,$couleur,$pv){
        $pdo = Model::getPDO();
        $nbCreature = $pdo->query("SELECT COUNT(*) FROM creature WHERE mail='{$_SESSION['mail']}'");
        $nbCreature = $nbCreature->fetch(PDO::FETCH_ASSOC);
        $nbCreature = $nbCreature["COUNT(*)"]++;
        $nomTete=$pdo->query("SELECT nomTete FROM tete WHERE idTete=$tete");
        $nomTete=$nomTete->fetch(PDO::FETCH_ASSOC);
        $nomTete=$nomTete["nomTete"];
        $nomCorps=$pdo->query("SELECT nomCorps FROM corps WHERE idCorps=$corps");
        $nomCorps=$nomCorps->fetch(PDO::FETCH_ASSOC);
        $nomCorps=$nomCorps["nomCorps"];
        $nomJambe=$pdo->query("SELECT nomJambe FROM jambe WHERE idJambe=$jambe");
        $nomJambe=$nomJambe->fetch(PDO::FETCH_ASSOC);
        $nomJambe=$nomJambe["nomJambe"];
        $nomCreature="{$nomTete}{$nomCorps}{$nomJambe}";
        $pdo->query("INSERT INTO creature VALUES('{$_SESSION['mail']}','Crea{$nbCreature}','$nomCreature', '$couleur',$pv,$tete,$corps,$jambe)");
        return $nomCreature;
    }
}
?>