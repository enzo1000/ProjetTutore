<?php
/*
require_once "formCrea.php";
require_once "connexion.php";

$tete = $_POST['tete'];
$corps = $_POST['corps'];
$jambe = $_POST['jambe'];

$pv = rand(50, 100);


$nbCrea = $conn->prepare('SELECT * FROM creature');
$nbCrea->execute();

$tab_crea = $nbCrea->fetchAll();

foreach ($tab_crea as $crea) {

    $crea['idJambe'];
    $req = $conn->prepare("INSERT INTO creature VALUES (\"{$tete}{$corps}{$jambe}b, chat , bleu, {$pv}, $tete, $corps, $jambes);\" ");
    $req = $conn->prepare("INSERT INTO creature VALUES (\"{$tete}{$corps}{$jambe}n, chat , noir, {$pv}, $tete, $corps, $jambes);\" ");
    $req = $conn->prepare("INSERT INTO creature VALUES (\"{$tete}{$corps}{$jambe}r, chat , rouge, {$pv}, $tete, $corps, $jambes);\" ");
}

$req = $conn->prepare("INSERT INTO Creature VALUES (\"{$tete}{$corps}{$jambe}b, chat , bleu, {$pv}, $tete, $corps, $jambes);\" ");

*/
?>