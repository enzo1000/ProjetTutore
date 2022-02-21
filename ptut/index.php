<?php
/*---------------------------------------------------------------*/
/*
    Titre : Comment placer plusieurs boutons dans un formulaire                                                           
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=88
    Date édition     : 04 Nov 2004                                                                                        
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    // Comment placer plusieurs boutons dans le même formulaire

    if (!empty($_POST)) { 
        echo '<p>Le bouton enfoncé est le bouton '; 
        if (isset($_POST['bouton2'])) { 
            echo '2'; 
        } elseif (isset($_POST['bouton3'])) { 
            echo '3'; 
        } else { 
            echo '1';
        } 
     }

?>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <input type="TEXT" name="champ">
      <input type="SUBMIT" name="bouton1" value="Le bouton 1">
      <input type="SUBMIT" name="bouton2" value="Le bouton 2">
      <input type="SUBMIT" name="bouton3" value="Le bouton 3">
      </form>