<header>
    <?php
    echo "
    <div id='navbar'>
        <div id='joueur'><a href='index.php?controller=joueur&action=joueurInfo'> {$_SESSION['pseudo']} </a></div>
        <div id='deconnexion'><a href='index.php?controller=ICD&action=deconnexion'> déconnexion </a></div>";

    echo "</div>";
    ?>
    <div id="titre">CréAnimals</div>
    <div class="boxe_timer" id="timer">
        <div id="horloge">...</div>
        <?php
        echo '<input type="hidden" id="last-date" name="last-date" value= "' . $_SESSION['joueur']['tirage'] . '">';

        if(isset($_SESSION['creature'])) {
            echo '<button id="boutton_tirage" ><a href="index.php?controller=creature&action=supprime_CreatureSession"> On peut tirer</a></button>';
        }
        else
            echo '<button id="boutton_tirage" ><a href="index.php?controller=creature&action=getRandom" action="random()">On peut tirer</a></button>';

        ?>
    </div>

</header>