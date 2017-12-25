function validerBilde(){
    //definerer variabler for senere referanse
    var infotext = document.getElementById("infotxt");
    var bildeNr = document.getElementById("bildeNr");
    var dato = document.getElementById("dato");
    var filnavn = document.getElementById("filnavn");
    var beskrivelse = document.getElementById("beskrivelse");
    
    //bruker flag for å teste om registreringa er godkjennt
    var flag = true;
    
    //setter fargen til rød og fjerner tisligerre tekst
    infotext.style.color="red";
    infotext.innerHTML = "";
    
    //skjekker at bildenummer er fyllt ut..
    if(bildeNr.value==""){
        infotext.innerHTML += "Du må fylle ut <b>bildenummeret!</b><br>";
        flag = false;
    }
    
    //console.log(isNaN(2));
    
    //skjekker at bildenummer er 3 lang og ett nummer
    if(bildeNr.value.length!="3"||isNaN(bildeNr.value)){
        infotext.innerHTML += "Bildenummeret må inneholde <b>3 tall!</b><br>";
        flag = false;
    }
    
    //skjekke at dato er fyllt ut
    if(dato.value==""){
        infotext.innerHTML += "Du må fylle ut <b>dato!</b><br>";
        flag = false;
    }
    
    //console.log(dato.value);
    
    //skjekke at alt med datoen er godkjennt
    if(isNaN(dato.value.substr(0,4))||
       isNaN(dato.value.substr(5,2))||
       isNaN(dato.value.substr(8,2))||
       dato.value[4]!="-"||
       dato.value[7]!="-"){
        infotext.innerHTML += "Dato må ha skrives på formatet: <b>ÅÅÅÅ-MM-DD</b><br>";
        flag = false;
    }
    
    //skjekke at måneden er 1-12 og ikke mer eller mindre
    if(dato.value.substr(5,2)<=0||
       dato.value.substr(5,2)>=13){
        infotext.innerHTML += "Måned (MM) i dato må være <b>fra 01 til og med 12</b><br>";
        flag = false;
    }
    
    //skjekke at dato er større enn 0, og at datoen ikke er mer enn det
    //som er lov for måneden (februar har bare 28 dager skuddår eller ikke i en ideell verden)
    if(dato.value.substr(8,2)<=0||testdato(dato, infotext)){
        infotext.innerHTML += "Dag (DD) i dato må være 01 eller mer!<br>";
        flag = false;
    }
    
    //skjekker at filnavn er fyllt ut
    if(filnavn.value==""){
        infotext.innerHTML += "Du må fylle ut <b>filnavn!</b><br>";
        flag = false;
    }
    
    //skjekker at beskrivelse er fyllt ut
    if(beskrivelse.value==""){
        infotext.innerHTML += "Du må fylle ut <b>beskrivelse!</b><br>";
        flag = false;
    }
    
    return flag;
    
}


function testdato(dato, infotext){
    //for januar
    if(dato.value.substr(5,2)=="01"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Januar har bare 31 dager!<br>";
        return true;
    }
    
    //for februar
    if(dato.value.substr(5,2)=="02"&&dato.value.substr(8,2)>=29){
        infotext.innerHTML+="Februar har bare 28 dager!<br>";
        return true;
    } 
    
    //for mars
    if(dato.value.substr(5,2)=="03"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Mars har bare 31 dager!<br>";
        return true;
    }
    
    //for april
    if(dato.value.substr(5,2)=="04"&&dato.value.substr(8,2)>=31){
        infotext.innerHTML+="April har bare 30 dager!<br>";
        return true;
    }
    
    //for mai
    if(dato.value.substr(5,2)=="05"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Mai har bare 31 dager!<br>";
        return true;
    }
    
    //for juni
    if(dato.value.substr(5,2)=="06"&&dato.value.substr(8,2)>=31){
        infotext.innerHTML+="Juni har bare 30 dager!<br>";
        return true;
    }
    
    //for juli
    if(dato.value.substr(5,2)=="07"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Juli har bare 31 dager!<br>";
        return true;
    }
    
    //for august
    if(dato.value.substr(5,2)=="08"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="August har bare 31 dager!<br>";
        return true;
    }
    
    //for september
    if(dato.value.substr(5,2)=="09"&&dato.value.substr(8,2)>=31){
        infotext.innerHTML+="September har bare 30 dager!<br>";
        return true;
    }
    
    //for oktober
    if(dato.value.substr(5,2)=="10"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Oktober har bare 31 dager!<br>";
        return true;
    }
    
    //for november
    if(dato.value.substr(5,2)=="11"&&dato.value.substr(8,2)>=31){
        infotext.innerHTML+="November har bare 30 dager!<br>";
        return true;
    }
    
    //for desember
    if(dato.value.substr(5,2)=="12"&&dato.value.substr(8,2)>=32){
        infotext.innerHTML+="Desember har bare 31 dager!<br>";
        return true;
    }
}
