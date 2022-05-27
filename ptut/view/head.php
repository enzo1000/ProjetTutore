<head>
    <meta charset="UTF-8">
    <script src="view/js/jquery.js"></script>
    <script src="view/js/accueil.js"></script>
    <link rel="stylesheet" href="view/CSS/index.css">
    <title><?php 
            if(isset($_SESSION['pseudo']))
            echo "Jeu de {$_SESSION['pseudo']}";
            else echo "CréAnimals";
      ?></title>
</head>