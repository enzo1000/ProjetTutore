
<main>
    <div id='volet'>
        <div id='creature' >
           
<?php

foreach($tab_c as $IDcreature){
    $dir_img = "view/images/";

        echo "
        <div class='boxCreature'>
            <a href='index.php?controller=creature&action=info&attribut={$IDcreature->getIDCreature()}'  class='inventaire_creature'>

                <img src=" . $dir_img . "tetes/" . $IDcreature->getIDTete() . ".png " . " class='tete'/>
                <img src=" . $dir_img . "corps/" . $IDcreature->getIdCorps() . ".png " . " class='corps'/>
                <img src=" . $dir_img . "jambes/" . $IDcreature->getIdJambe() . ".png " . " class='jambes'/>
            
            </a>
            <div>
                <p style='color:". $IDcreature->getCouleur()."'>". $IDcreature->getNom()."</p>
            </div>
            <a href='index.php?controller=creature&action=supprimer&attribut={$IDcreature->getIDCreature()}'><div class='supprimerCreature'></div></a>
        </div>";
        }
?>
        </div>
        <a href='index.php?controller=ICD&action=connexion' class='fermer' aria-hidden='true'>fermer</a>
    </div>

    <div id='infoCreature'>
        <p style='text-align: center'>INFORMATIONS</p>

<?php
    if(isset($_SESSION['infoCreature'])){
        $dir_img = "view/images/";
        $crea=$_SESSION['infoCreature'][0];
        echo "
        <div class='inventaire_creature'>
            <img src='{$dir_img}tetes/{$crea['IDTete']}.png' class='tete' />
            <img src='{$dir_img}corps/{$crea['IDCorps']}.png' class='corps'/>
            <img src='{$dir_img}jambes/{$crea['IDJambe']}.png' class='jambes'/>
        </div>
        <div id='nom'>{$crea['nom']}</div>
        <div id='IDCreature'>{$crea['IDCreature']}</div>
        <div style='color: {$crea['couleur']};'> Couleur : {$crea['couleur']}</div>
        <div id='pv'> PV : {$crea['PV']}</div>
        <div id='ajoutJardin'> ajouter dans jardin</div>";
    }
?>
    </div>
</main>
<?php
require_once File::build_path(array("view", "footer.php"));
?>