<header>
    <?php
    echo "
    <div id='navbar'>
        <div id='joueur'> {$_SESSION['pseudo']} </div>
        <div id='deconnexion'><a href='index.php?controller=ICD&action=deconnexion'> déconnection </a></div>";
    echo ($_SESSION['joueur']['tirage']);
    echo "</div>";
    ?>
    <div id="titre">CréAnimals</div>
    <div class="boxe_timer">
        <div id="horloge">...</div>
        <?php
        echo '<input type="hidden" id="last-date" name="last-date" value= "' . $_SESSION['joueur']['tirage'] .'">';

        ?>

        <button id="tirage"><a href="index.php?controller=creature&action=getRandom"> On peut tirer</a></button>


    </div>

</header>