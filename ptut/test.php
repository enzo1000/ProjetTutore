<!DOCTYPE html>
<html>

<head>
    <title>This is document title</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<h1>This is a heading</h1>
</body>

<?php
$dir_img = "images/";
include_once "connexion.php";
global $conn;
$jambe = $conn->query("SELECT IDJambe FROM Jambe");
$tete = $conn->query("SELECT IDTete FROM Tete");
$corps = $conn->query("SELECT IDCorps FROM Corps");

$nbligne = $conn->query("SELECT COUNT(IDTete) as nb FROM Tete");

$nbligne = $nbligne->fetch(PDO::FETCH_ASSOC);

foreach ($nbligne as $value) {
    $nbc = $value;
}

$a = rand(1, $nbc);
$b = rand(1, $nbc);
$c = rand(1, $nbc);

//$req = "SELECT IDCreature FROM Creature JOIN Tete ON Creature.IDTete = Tete.I>
$creature =$conn->query("SELECT IDCreature FROM Creature JOIN Tete ON Creature.>
$creature = $creature->fetch(PDO::FETCH_ASSOC);

if($creature ==null){
    echo "cette creature nexiste pas on doit l'ajouter";
}
else{ echo "cette crezture existe";}


echo "<div class='creature'>";
echo "<img src=" . $dir_img . "tetes/" . $a . ".png "." class='tete'/>";
//echo "<img src=" . $dir_img . "tetes/1.png "." class='tete'/>";
echo "<img src=" . $dir_img . "corps/" . $b . ".png "." class='corps'/>";
echo "<img src=" . $dir_img . "jambes/" . $c . ".png "." class='jambe'/>";
echo "</div>";

?>

</html>

/*

-> Créer le formulaire avec les champs
-> Permettre d'envoyer du texte pour les attributs et une image pour chaque par>
-> Vérification dans la bdd si les champs sont disponible (PK)

-> Le programme créer les créatures avec la nouvelle renseignée
