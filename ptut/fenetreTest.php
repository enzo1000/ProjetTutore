<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styleFenetre.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<a href="#id01">Ouvrir la fenêtre modale</a>

<div id="id01" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <header class="container">
                <a href="#" class="closebtn">×</a>
                <h2>Random créatures</h2>
            </header>
            <div class="container">

                <?php


                    include_once "connexion.php";
                    $dir_img = "images/";
                    global $conn;
                    $jambe = $conn->query("SELECT IDJambe FROM jambe");
                    $tete = $conn->query("SELECT IDTete FROM tete");
                    $corps = $conn->query("SELECT IDCorps FROM corps");

                    $nbligne = $conn->query("SELECT COUNT(IDTete) as nb FROM tete");

                    $nbligne = $nbligne->fetch(PDO::FETCH_ASSOC);

                    foreach ($nbligne as $value) {
                        $nbc = $value;
                    }

                    $a = rand(1, $nbc);
                    $b = rand(1, $nbc);
                    $c = rand(1, $nbc);

                    echo "<div class='creature'>";
                    echo "<img src=" . $dir_img . "tetes/" . $a . ".png " . " class='tete'/>";
                    echo "<img src=" . $dir_img . "corps/" . $b . ".png " . " class='corps'/>";
                    echo "<img src=" . $dir_img . "jambes/" . $c . ".png " . " class='jambes'/>";
                    echo "</div>";


                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

