<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<form method="POST" action="index.php?controller=ICD&action=connexion">
    <fieldset>
        <div class="containerC">
            <div class="headForm">
                <h1><i class="Titre" aria-hidden="true"></i> Connexion :</h1>

            </div>
            <br/><br/>


            <div class="input-group">
                <label for="mail" class="label">Mail : </label>
                <input type="text" class="form-control" placeholder="joueur@gmail.com" name="mail" id="mail" required"/>
            </div>
            <br/>

            <div class="input-group">
                <label for="mdp" class="label">Mot de passe : </label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="password" required/>
            </div>
            <br/>

            <button type="submit" class="btnConnection"> Connexion </button>

            <br/>
            <div class="ligne"></div>
            <div class="footerForm">
                <p>Pas de compte ! <a href="./index.php?controller=ICD&action=formInscription">Inscrivez-vous </a></p>
            </div>

        </div>
    </fieldset>
</form>