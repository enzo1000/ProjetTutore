<html>
    <head>
        <title>Formulaire Créatures</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="POST" action="addCrea.php">
            <fieldset>
              <legend>Mon formulaire :</legend>
              <p>
                <label for="tete_id">Immatriculation</label> :
                <input type="text" placeholder="id de la tête" name="tete" id="tete_id">
              </p>
              <p>
                <label for="corps_id">Marque</label> :
                <input type="text" placeholder="id du corp" name="corps" id="corps_id" required/>
              </p>
              <p>
                <label for="jambe_id">Immatriculation</label> :
                <input type="text" placeholder="id des jambes" name="jambe" id="jambe_id" required/>
              </p>
              <p>
                <label for="jambe_id">Immatriculation</label> :
                <input type="text" placeholder="id des jambes" name="jambe" id="jambe_id" required/>
              </p>
              <p>
                <input type="submit" value="Envoyer" />
              </p>
            </fieldset> 
          </form>

    </body>

</html>