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
        $dir_img = "/ptut/images/";
        include_once "connexion.php";
	echo "coucou";

        $a = rand(1, 2);
        $b = rand(1, 2);
        $c = rand(1, 2);

        echo "<div>";
        echo "<img src=" . $dir_img . "tetes/" . $a . ".png />";
        echo "<img src=" . $dir_img . "corps/" . $b . ".png />";
        echo "<img src=" . $dir_img . "jambes/" . $c . ".png />";
        echo "</div>";

    ?>

</html>