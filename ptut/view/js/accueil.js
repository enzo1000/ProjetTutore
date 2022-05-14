$(document).ready(function () {
    $("#joueur").click(function () {
        // Append a new empty row with two buttons in the end
        $("#joueur").append(`coucou`);
    });


});
document.addEventListener(
    "click",
    function(event) {
        // If user either clicks X button OR clicks outside the modal window, then close modal by calling closeModal()
        if (
            event.target.matches(".button-close-modal") ||
            !event.target.closest(".modal")
        ) {

            closeModal()

        }
    },
    false
)

function closeModal() {


    document.getElementById('timer').style.cursor = 'auto';
    document.getElementById('timer').style.pointerEvents = 'auto';
    document.getElementById('bouttonInventaire').style.cursor = 'auto';
    document.getElementById('bouttonInventaire').style.pointerEvents = 'auto';

    document.location.href="http://localhost/ptut/ProjetTutore/ptut/index.php?controller=ICD&action=connexion";
}


function timer() {
    document.getElementById("horloge").style.display = 'contents';
    document.getElementById("tirage").style.display = 'none';
    var dt = new Date()
    //document.getElementById("horloge").innerHTML=(23-dt.getHours())+":"+(59-dt.getMinutes())+":"+(59-dt.getSeconds());
    document.getElementById("horloge").innerHTML = "Tirage dans " + (59 - dt.getSeconds()) + " secondes";

    if (59 - dt.getSeconds() === 0) {
        var monEvent = document.getElementById("horloge");
        monEvent.style.display = 'none';
        document.getElementById("tirage").style.display = 'contents';
    } else setTimeout("timer()", 1000);
    /*
            var monEvent = document.getElementById("horloge");
            monEvent.style.display = 'none';
            document.getElementById("tirage").style.display = 'contents';
    */

}

function minuteur() {

    document.getElementById("horloge").style.display = 'contents';
    document.getElementById("boutton_tirage").style.display = 'none';
    console.log(document.getElementById("last-date"));
    var dernierTirage = Date.parse(document.getElementById("last-date").value);
    console.info(dernierTirage);
    var tempsActuel = new Date();
    console.info(tempsActuel - dernierTirage);

    var temps = tempsActuel - dernierTirage;
    dernierTirage=new Date(dernierTirage);
    dernierTirage.setDate(dernierTirage.getDate() + 1);

    var tempsRestant = new Date(dernierTirage - tempsActuel);


    document.getElementById('horloge').innerText = tempsRestant.getHours() + ":" + tempsRestant.getMinutes() + ":" + tempsRestant.getSeconds();
// TODO 3600*1000*24
    if (temps >= 10000  ) {
        var monEvent = document.getElementById("horloge");
        monEvent.style.display = 'none';
        document.getElementById("boutton_tirage").style.display = 'contents';
    } else {
        setTimeout("minuteur()", 100);
    }


}




// function displayBlock(){

//     document.getElementById("modal").style.display = 'block';
//     // document.getElementById("volet").style.display ='none';
// };
// function displayNone(){
//     document.getElementById("modal").style.display = 'none';
//     document.getElementById("volet").style.display ='block';
// }

function changerFontImage() {
    document.getElementById("boites").style.backgroundImage = "url(view/images/jardins/ocean.jpg)";
}

function changerFontImage2() {
    document.getElementById("boites").style.backgroundImage = "url(view/images/jardins/herbe.jpg)";
}

// function afficherInventaire(){
//     // document.getElementById("d").innerHTML='he';
//     document.getElementById('jardin').style.display='none';
//     document.getElementById('volet').removeAttribute("style");
// }
// function fermerInventaire(){
//     // document.getElementById("d").innerHTML='he';
//     document.getElementById('jardin').style.display='block';
//     document.getElementById('jardin').style.display='flex';
//     document.getElementById('volet').setAttribute("left", "-100%");
// }

