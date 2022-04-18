<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="script.js" type="text/javascript"></script>
</head>
<body>

    <div id="main">
        <h1> loremipsum </h1>



<div class="boxe_timer">
            <form>
                <div id="horloge">...</div>
                <button id="tirage" ><a href="#id01"> On peut tirer</a></button>






                <script type="text/javascript">
                    function Timer() {
                        document.getElementById("horloge").style.display = 'contents';
                        document.getElementById("tirage").style.display = 'none';
                        var dt=new Date()
                        //document.getElementById("horloge").innerHTML=(24-dt.getHours())+":"+(59-dt.getMinutes())+":"+(59-dt.getSeconds());


                            document.getElementById("horloge").innerHTML = "Tirage dans " + (59 - dt.getSeconds()) + " secondes";


                            if(59-dt.getSeconds() === 0){
                                var monEvent=document.getElementById("horloge");
                                monEvent.style.display = 'none';
                                document.getElementById("tirage").style.display = 'contents';
                            }
                            else  setTimeout("Timer()", 1000);

                        }
                    Timer();


                        //console.log("Exécution de Timer()");


                </script>


            </form>
        </div>


        </div>




        <div class="ligne">
            <div class="bouton">

            </div>
            <div class="boites">


            </div>
            <div class="bouton">

            </div>

            <div id="data">


            </div>

            <div id="collection">

            </div>

        </div>



        <div>
            <p> loremipsum </p>
        </div>
    </div>
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