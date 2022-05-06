
$(document).ready(function() {
    $("#joueur").click(function() {
        // Append a new empty row with two buttons in the end
        $("#joueur").append(`coucou`);
    });



});

function timer() {
    document.getElementById("horloge").style.display = 'contents';
    document.getElementById("tirage").style.display = 'none';
    var dt = new Date()
    //document.getElementById("horloge").innerHTML=(24-dt.getHours())+":"+(59-dt.getMinutes())+":"+(59-dt.getSeconds());
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


// function displayBlock(){
  
//     document.getElementById("modal").style.display = 'block';
//     // document.getElementById("volet").style.display ='none';
// };
// function displayNone(){
//     document.getElementById("modal").style.display = 'none';
//     document.getElementById("volet").style.display ='block';
// }

function changerFontImage(){
    document.getElementById("boites").style.backgroundImage = "url(view/images/jardins/ocean.jpg)";
}
function changerFontImage2(){
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

