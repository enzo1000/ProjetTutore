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

?>

