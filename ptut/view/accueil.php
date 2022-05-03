<?php
require_once File::build_path(array("model","ModelJoueur.php"));
require_once File::build_path(array("controller","ControllerJoueur.php"));
session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="view/CSS/index.css">
    <title>Jeu de <?php echo $_SESSION['pseudo'];?></title>
    <!--<script src="script.js" type="text/javascript"></script>-->
</head>
<body>
<header>
<div id="main">
    <h1> loremipsum </h1>
    <?php echo "
    <div><div id='joueur'> {$_SESSION['pseudo']} </div>
                <div id='deconnexion'><a href='index.php?controller=ICD&action=deconnexion'> se déconnecter </a></div>
                <div>"; ?>
   
    <div class="boxe_timer">
        <form>
            <div id="horloge">...</div>
            <button id="tirage"><a href="#id01"> On peut tirer</a></button>

            <script type="text/javascript">
                function Timer() {
            document.getElementById("horloge").style.display = 'contents';
            document.getElementById("tirage").style.display = 'none';
            var dt = new Date()
            //document.getElementById("horloge").innerHTML=(24-dt.getHours())+":"+(59-dt.getMinutes())+":"+(59-dt.getSeconds());

            document.getElementById("horloge").innerHTML = "Tirage dans " + (59 - dt.getSeconds()) + " secondes";


            if (59 - dt.getSeconds() === 0) {
                var monEvent = document.getElementById("horloge");
                monEvent.style.display = 'none';
                document.getElementById("tirage").style.display = 'contents';
            } else setTimeout("Timer()", 1000);

            /*
                        var monEvent = document.getElementById("horloge");
                        monEvent.style.display = 'none';
                        document.getElementById("tirage").style.display = 'contents';
            */

        }
                Timer();
                //console.log("Exécution de Timer()");
            </script>

        </form>
    </div>


</div>
</header>

<div class="ligne">
        
    <div class="bouton">

    </div>
    <div class="boites">

    </div>
    <div class="bouton">

    </div>

    <div id="data">


    </div>
   
    
    <div id="collection">
        <div>
       <button onclick='afficherInventaire()'> inventaire </button>
        </div>
        <script>

        function afficherInventaire(){
            // document.getElementById("d").innerHTML='he';
            document.getElementById("d").display="none";
            document.getElementsByClassName('bouton').style.display='none';
            document.getElementsByClassName('boites').style.display='none';
           
        }
        </script>
           <?php /*
            if(isset($_SESSION['inventaire'])&&$_SESSION['inventaire']=="ouvert"){
                ControllerJoueur::readAllCreatures();
            }*/
            ?>
    </div>

</div>

<div id="id01" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <header class="container">
            
                <a class="closebtn" href="index.php?controller=ICD&action=connexion" class="closebtn" onclick="document.location.reload(true)">×</a>
                <h2>Random créatures</h2>
            </header>
            <div class="container">

                <?php
                    require_once File::build_path(array("controller","ControllerCreature.php"));
                    echo ControllerCreature::getRandom();
                ?> 
            
            </div>

        </div>
    </div>
</div>

</body>


</html>