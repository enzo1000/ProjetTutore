<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<html>
<head>
    <title>Formulaire Inscription</title>
    <meta charset="utf-8" />
</head>
<body>

<form method="POST" action="index.php?controller=ICD&action=inscription">
    <fieldset>
        <div class="containerI">
            <div class="headForm">
                <h1><i class="Titre" aria-hidden="true"></i> Inscription</h1>

            </div>
            <br/><br/>


            <div class="input-group">


                <label for="mail" class="label">Mail : </label>
                <input type="text" class="form-control" placeholder="joueur@gmail.com" name="mail" id="mail" required"/>
            </div>
            <br/>

            <div class="input-group">

                <label for="pseudo" class="label">Pseudo : </label>
                <input type="text" class="form-control" placeholder="joueur" name="pseudo" id="pseudo" required/>

            </div>
            <br/>

            <div class="input-group">

                <label for="mdp" class="label">Mot de passe : </label>
                <input type="password" class="form-control" placeholder="1234" name="mdp" id="mdp" required/>

            </div>
            <br/>

            <div class="input-group">

                <label for="mdp2" class="label">Vérifier mot de passe : </label>
                <input type="password" class="form-control" placeholder="1234" name="mdp2" id="mdp2" required/>

            </div>
            <br/>

            <button type="submit" class="btnConnection"> Envoyer </button>

            <br/>
            <div class="ligne"></div>
            <div class="footerForm">

                <p>Déjà un compte ! <a href="./index.php?controller=ICD&action=formConnexion">Connectez-vous </a></p>
            </div>

        </div>
    </fieldset>
</form>

</body>

</html>