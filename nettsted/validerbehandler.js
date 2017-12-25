function valider(){
    var behandlerId = document.getElementById("behandlerId");
    var infotext = document.getElementById("infotxt");
    
    //flag for å teste om aller verdierne er gyldige
    var flag = true;
    
    //setter sinfortext til å ikke ha noe innhold så vi kan skrive ut alle feilmeldingene
    infotext.style.color="red";
    infotext.innerHTML = "";
    
    //Skjekke at behandler Id er fyllt ut
    if(behandlerId.value==""){
        infotext.innerHTML += "Du må fylle ut <b>behandler ID!</b><br>";
        flag = false;
    }
    //Skjekke at behandler ID er 2 eller 3 lang
    if(behandlerId.value.length!=2&&
       behandlerId.value.length!=3){
        infotext.innerHTML += "Behandler ID må være <b>2 eller 3 bokstaver</b> i lengden!<br>";
        flag = false;
    }
    
    return flag;
}