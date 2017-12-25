function validerPasient(){
    //definerer variabler for senere referanse
    var infotext = document.getElementById("infotxt");    
    var fornavn = document.getElementById("fornavn");
    var etternavn = document.getElementById("etternavn");
    var pasientId = document.getElementById("pasientId");
    var behandlerID = document.getElementById("behandlerId");

    var flag = true;
    //setter fargen til rød og tømmer infoboksen
    infotext.style.color="red";
    infotext.innerHTML = ""; 
    
    //skjekker at pasient id er fyllt ut
    if(pasientId.value==""){
      infotext.innerHTML += "Du må fylle ut <b>pasient ID!</b><br>"; 
      flag = false;   
    }
    
    //skjekker at pasient id er 2 eller 3 i lengden
    if(pasientId.value.length!=3&&pasientId.value.length!=2){
      infotext.innerHTML += "Pasient ID må være <b>2 eller 3</b> tegn! Æ,ø eller å er ikke tilatt!<br>"; 
      flag = false;   
    }
    
    //skjekker at fornavn er fyllt ut
    if(fornavn.value==""){
      infotext.innerHTML += "Du må fylle ut <b>fornavn!</b><br>"; 
      flag = false;   
    }
    
    //skjekker at etternavn er fyllt ut
    if(etternavn.value==""){
      infotext.innerHTML += "Du må fylle ut <b>etternavn!</b><br>"; 
      flag = false;   
    }
    
    //skjekker at behandler id er fyllt ut
    if(behandlerID.value==""){
        infotext.innerHTML += "Du må fylle ut <b>behandler ID!</b><br>";
        flag = false;
    }
    
    //skjekker at behandler id er 2 eller 3 i lengden
    if(behandlerID.value.length!=2&&
       behandlerID.value.length!=3){
        infotext.innerHTML += "Behandler ID må være <b>2 eller 3 bokstaver</b> i lengden! Æ,ø eller å er ikke tilatt!<br>";
        flag = false;
    }
    return flag;
}
