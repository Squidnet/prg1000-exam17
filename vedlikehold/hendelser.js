/* felt i fokus*/
function fokus(element)
{
    element.style.backgroundColor="mediumseagreen";
}

function nonfokus(element)
{
    element.style.backgroundColor="white";
}

/* mus hover over felt */
function hover(element)
{
    //console.log(element.id);
    document.getElementById("infotxt").style.color="darkgreen";
    
    //bruker switch for bedre oversikt og mindre tester(if setninger)
     switch(element.id){
         case "fornavn":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn fornavn.";
             break;
         case "etternavn":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn etternavn.";
             break;
         case "pasientId":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn pasient ID.";
             break;
         case "yrke":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn yrke.";
             break;
         case "bildeNr":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn bildenummer.";
             break;
         case "dato":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn dato.";
             break;
         case "filnavn":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn filnavn.";
             break;
         case "beskrivelse":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn beskrivelse.";
             break;
         case "behandlerId":     
         case "bid":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn behandler ID.";
             break;
         case "maksAntallPasienter":
             document.getElementById("infotxt").innerHTML="Vennligst fyll inn maks antall pasienter.";
             break;
         case "lastopp":
             document.getElementById("infotxt").innerHTML="Vennligst last opp ett bilde.";
             break;
         default:
             document.getElementById("infotxt").innerHTML="Denne er ikke lagt inn ennå.";
             break;
     }
}

/* nullstill knappen på form og mouseout */
function wipe()
{
    document.getElementById("infotxt").innerHTML="";
}
function wipeAjax(){
    document.getElementById("ajaxtxt").innerHTML="";
}




