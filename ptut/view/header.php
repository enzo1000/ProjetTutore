<header>
    <?php echo "
    <div id='navbar'>
        <div id='joueur'> {$_SESSION['pseudo']} </div>
        <div id='deconnexion'><a href='index.php?controller=ICD&action=deconnexion'> déconnection </a></div>
    </div>
    "; ?>
    <div id="titre">CréAnimals</div>
    <div class="boxe_timer">
        <div id="horloge">...</div>
        <button id="tirage"><a href="index.php?controller=creature&action=getRandom"> On peut tirer</a></button>
        <!-- <script type="text/javascript">
            function timer() {
                script
                timer();
        </script> -->
    </div>
</header>