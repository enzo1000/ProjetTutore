<?php
require_once '../lib/File.php';
require_once (File::build_path(array("config","Conf.php")));
class Model {
   
  private static $pdo = NULL;

  public static function init(){
    
    $hostname=Conf::gethostname();
    $database_name=Conf::getDatabase();
    $login=Conf::getLogin();
    $password=Conf::getPassword();

    try{
      self::$pdo=new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                          // sert à ce que toutes les chaines de caractères en entrée et sortie de MySql 
                          //soit dans le codage UTF-8 (pas obligatoire)
                          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
      //Si $debug==true, on affiche directement message d'erreur, sinon...
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
      } else {
        echo 'Une erreur est survenue <a href="           "> retour a la page d\'accueil </a>';
      }
      die();
    }
  }

  //Codez l’accesseur getPDO() pour qu’il initialise l’attribut self::$pdo si il ne contient pas encore de connexion
  public static function getPDO(){
    if(is_null(self::$pdo)){
      self::init();
    }
    return self::$pdo;
  }
}
?>
