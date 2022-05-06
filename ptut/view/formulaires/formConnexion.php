<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
        <form method="POST" action="index.php?controller=ICD&action=connexion">
            <fieldset>
              <legend>Connexion :</legend>
              <p>
                <label for="mail">Mail</label> :
                <input type="text" placeholder="joueur.gmail.com" name="mail" id="mail" required>
              </p>
              <p>
                <label for="mdp">Mot de passe</label> :
                <input type="password" name="mdp" id="mdp" required/>
              </p>
              <p>
                <input type="submit" value="Je me connecte" />
              </p>
            </fieldset> 
          </form>