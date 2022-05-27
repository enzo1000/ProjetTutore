$(document).ready(function () {

    $("#nom").click(function(){
        let nom=document.getElementById("nom").textContent;
        let id=document.getElementById("IDCreature").textContent;
        $("div").remove("#nom");
        $("#IDCreature").before("<form method='POST' action='index.php?controller=creature&action=modNom&attribut="+id+"'> <input id='modNom' name='nom' type=text value='"+nom+"'> <input type='submit' value='Confirmer'></form>");
        //$("#IDCreature").before("<a id='confirmer href='index.php?controller=creature&action=modNom&attribut="+id+"&attribut2="+$("#modNom").val()+"'>Confirmer</a>");
    })
  /*
    $("#infoCreature").click(function(){
        if(document.getElementById("#modNom")){
            location.reload();
            $("#IDCreature").before("<form method='POST' action='index.php?controller=creature&action=modNom&attribut="+id+"'> <input id='modNom' name='nom' type=text value='"+nom+"'> <input type='submit' value='Confirmer'></form>");
        }
    })*/

    $("#ajoutJardin").click(function(){
        let id=document.getElementById("IDCreature").textContent;
        $("div").remove("#ajoutJardin");
        $("#pv").after("<div class='ajoutEnclos'>"+
                       "<div><a href='index.php?controller=creature&action=ajoutJardin&enclos=1&attribut="+id+"'>enclos1</a></div>"+
                       "<div><a href='index.php?controller=creature&action=ajoutJardin&enclos=2&attribut="+id+"'><div>enclos2</a></div></div>");

    })

      document.addEventListener(
        "click",
        function(event) {
            // If user either clicks X button OR clicks outside the modal window, then close modal by calling closeModal()
            if (
                event.target.matches(".button-close-modal") ||
                (!event.target.matches(".button-close-modal") && getElementById("modal"))
            ) {
    
                closeModal()
    
            }
        },
        false
    )

});

function modNom(){
    let nom=document.getElementById("nom");
    removeChild(nom);
}


// function random(){
//     document.getElementById('timer').style.cursor = 'default';
//     document.getElementById('timer').style.pointerEvents = 'none';
//     document.getElementById('bouttonInventaire').style.cursor = 'default';
//     document.getElementById('bouttonInventaire').style.pointerEvents = 'none';
// }



function closeModal() {

    document.getElementById('timer').style.cursor = 'auto';
    document.getElementById('timer').style.pointerEvents = 'auto';
    document.getElementById('bouttonInventaire').style.cursor = 'auto';
    document.getElementById('bouttonInventaire').style.pointerEvents = 'auto';

    document.location.href="index.php?controller=ICD&action=connexion";
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

// function changerFontImage() {
//     document.getElementById("boites").style.backgroundImage = "url(view/images/jardins/ocean.jpg)";
// }

// function changerFontImage2() {
//     document.getElementById("boites").style.backgroundImage = "url(view/images/jardins/herbe.jpg)";
// }

