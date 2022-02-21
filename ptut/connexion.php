<?php


$user = 'root';
$password = 'root';
$db = 'ptut';
$host = 'localhost';
$port = 3307;

try {
      $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION);

      //echo 'Connexion réussie';

} catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
}


/*

define('HOST', 'localhost'); // déclaration en local ( à changer apres)
define('DB_NAME', 'burillec');//nom de la bdd
define('USER', 'burillec'); // nom de l'utilisateur (compte)
define('PASS', '123456789'); // mot de passe de l'utilisateur (compte)

try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection ok";
} catch (PDOException $e) {
    echo $e;
}

//https://webinfo.iutmontp.univ-montp2.fr/~burillec/testbdd/

*/

/*
      $user = 'root';
      $password = 'root';
      $db = 'ptut';
      $host = 'localhost';
      $port = 3307;

      try {
      $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $password,
          $conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION

     );

*/
      //echo 'Connexion réussie';
/*
<?php


define('HOST', 'localhost'); // déclaration en local ( à changer apres)
define('DB_NAME', 'burillec');//nom de la bdd
define('USER', 'burillec'); // nom de l'utilisateur (compte)
define('PASS', '123456789'); // mot de passe de l'utilisateur (compte)



try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection ok";
} catch (PDOException $e) {
    echo $e;
}

//https://webinfo.iutmontp.univ-montp2.fr/~burillec/testbdd/


      }
      catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
      }
*/
   ?>

