<?php
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
}
?>