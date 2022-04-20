<?php

class File{
  public static function build_path($path_array) {
    // $ROOT_FOLDER (sans slash à la fin) vaut "C:/xampp/htdocs/Prog Web/td-php/TD5"
    
    //DIRECTORY_SEPARATOR permet d’utiliser le bon slash de séparation des chemins selon le système
    $DS = DIRECTORY_SEPARATOR;
     /* __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
       Si __DIR__ est utilisé dans une inclusion, le dossier du fichier inclus sera retourné. 
       Comme File.php est dans le dossier lib, nous devons redescendre d’un dossier avec "/.." */

    $ROOT_FOLDER = __DIR__ . $DS . ".."; 
    return $ROOT_FOLDER. $DS . join($DS, $path_array);
  }
}

?>
