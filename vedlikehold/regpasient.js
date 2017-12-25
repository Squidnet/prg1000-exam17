function validerPasient(){
    //definerer variabler for senere referanse
    var infotext = document.getElementById("infotxt");    
    var fornavn = document.getElementById("fornavn");
    var etternavn = document.getElementById("etternavn");
    var pasientId = document.getElementById("pasientId");

    var flag = true;
    
    //setter fargen til rød og fjerner innholdet til infotext
    infotext.style.color="red";
    infotext.innerHTML = ""; 
    
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
    
    //skjekker at pasient id er fyllt ut
    if(pasientId.value==""){
      infotext.innerHTML += "Du må fylle ut <b>pasient ID!</b><br>"; 
      flag = false;   
    }
    
    //skjekker at pasient id er enten 2 eller 3 lang
    if(pasientId.value.length!=3&&pasientId.value.length!=2){
      infotext.innerHTML += "Pasient ID må være <b>2 eller 3</b> tegn!<br>"; 
      flag = false;   
    }
    return flag;
}
