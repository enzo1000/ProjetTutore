<?php
class Conf{
  static private $debug = true;

  static private $databases = array(
    'hostname' => 'localhost',
    'database' => 'burillec',
    'login' => 'burillec',
    'password' => '123456789'
  );

  static public function getDebug()
  {
    return self::$debug;
  }

  static public function getLogin()
  {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    //en PHP, on appelle une méthode statique à partir du nom de la classe en utilisant :: au lieu du .
    return self::$databases['login'];
  }

  // 2.3  getHostname(), getDatabase() et getPassword()
  static public function getHostname()
  {
    return self::$databases['hostname'];
  }

  static public function getDatabase()
  {
    return self::$databases['database'];
  }

  static public function getPassword()
  {
    return self::$databases['password'];
  }
}

?>

