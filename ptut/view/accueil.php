
<?php $_SESSION["inventaire"]="ferme";
?>
<main id="test">
    <div id="collection">
        <a href="index.php?controller=joueur&action=readAllCreatures" id="bouttonInventaire" class="ouvrir" aria-hidden="true" onclick="afficherInventaire()">Inventaire</a>
    </div>

    <div id="infoCreature">
        <p style="text-align: center">INFORMATIONS</p>
        <?php
            if(isset($_SESSION['infoJoueur'])){
                echo "{$_SESSION['infoJoueur']}";
            }
            else if(!isset($_SESSION['jardin']) || sizeof($_SESSION['jardin'])==0){
                echo "Bonjour {$_SESSION['pseudo']}";
            }
        ?>
    </div>
    <div id="jardin">  
        <div class="bouton">
            <div>
                <a href="index.php?controller=ICD&action=connexion&enclos=2">
                <img src="view/images/aGauche.png"/>
                </a>
            </div>
        </div>
        <div id="boites" style="background-image:url(view/images/jardins/<?php echo $_SESSION['idEnclos']; ?>.jpg)">
      
        <div id='creature'>
    
            <?php 
                if(isset($_SESSION['jardin'])&& sizeof($_SESSION['jardin'])!=0){
                    foreach($_SESSION['jardin'] as $attribut=>$value){
                        echo $value;
                    } 
                }
            ?>
        </div>
        </div>
        <div class="bouton">
            <div>
                <a href="index.php?controller=ICD&action=connexion&enclos=1">
                    <img src="view/images/aDroite.png"/>
                </a>
            </div>
        </div>
    </div>
</main>


<?php
require_once File::build_path(array("view", "footer.php"));
    if(isset($_SESSION['random'])){
        echo $_SESSION['random'];
    }
?>

