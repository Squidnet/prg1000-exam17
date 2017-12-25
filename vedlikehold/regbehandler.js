function validerBehandler(){
    //definerer variabler til senere referanse
    var infotext = document.getElementById("infotxt");
    var behandlerID = document.getElementById("bid");
    var fornavn = document.getElementById("fornavn");
    var etternavn = document.getElementById("etternavn");
    var yrkesgruppe = document.getElementById("yrke");
    var bildeNr = document.getElementById("bildeNr");
    var MAP = document.getElementById("maksAntallPasienter");
    
    //flag for å teste om aller verdierne er gyldige
    var flag = true;
    
    //setter sinfortext til å ikke ha noe innhold så vi kan skrive ut alle feilmeldingene
    infotext.style.color="red";
    infotext.innerHTML = "";
    
    //Skjekke at behandler Id er fyllt ut
    if(behandlerID.value==""){
        infotext.innerHTML += "Du må fylle ut <b>behandler ID!</b><br>";
        flag = false;
    }
    //Skjekke at behandler ID er 2 eller 3 lang
    if(behandlerID.value.length!=2&&
       behandlerID.value.length!=3){
        infotext.innerHTML += "Behandler ID må være <b>2 eller 3 bokstaver</b> i lengden!<br>";
        flag = false;
    }
    //skjekke at fornavn er fyllt ut
    if(fornavn.value==""){
        infotext.innerHTML += "Du må fylle ut <b>fornavn!</b><br>";
        flag = false;
    }
    //skjekke at etternavn er fyllt ut
    if(etternavn.value==""){
        infotext.innerHTML += "Du må fylle ut <b>etternavn!</b><br>";
        flag = false;
    }
    //skjekke at yrkesgruppa er fyllt ut
    if(yrkesgruppe.value==""){
        infotext.innerHTML += "Du må fylle ut <b>yrkesgruppe!</b><br>";
        flag = false;
    }
    //skjekke at bildenummer er fyllt ut
    if(bildeNr.value==""){
        infotext.innerHTML += "Du må fylle ut <b>bilde nr!</b><br>";
        flag = false;
    }
    //skjekke at bildenummer er 3 i lengden
    if(bildeNr.value.length!=3){
        infotext.innerHTML += "Bildenummer må bestå av <b>3 tall!</b><br>";
        flag = false;
    }
    //skjekke at Maks anntall pasienter er fyllt ut
    if(MAP.value==""){
        infotext.innerHTML += "Du må fylle ut <b>maks antall pasienter!</b><br>";
        flag = false;
    }
    //skjekke at maks anntall pasienter er mer enn 0
    if(MAP.value<=0){
        infotext.innerHTML += "Maks antall pasienter må være over <b>0!</b><br>";
        flag = false;
    }
    //returnere om noe er feil eller ikke. flag=true/false
    return flag;
}



//funksjon for ajax for å vise behandlere med samme yrkesgruppe 
function behandlerajax(){
    //definere variabler for senere referanse
    var behandlerYrke = document.getElementById("yrke").value;
    var ajaxbox = document.getElementById("ajaxtxt");
    
    //starter lager en variabel for ajax
    var ajaxb = new XMLHttpRequest();
    //åpner variabelen til riktig fil og sier at den skal være asynkron
    ajaxb.open("POST","getRegBehandlere.php?yrke="+behandlerYrke,true);
    //funksjon som skjer når det skjer en endring i readystate
    ajaxb.onreadystatechange = function(){
        //bare for readystate 4 og status 200
        if(this.readyState==4&&this.status==200){
            //skrift farge til blå
            ajaxbox.style.color="blue";
            //skriver ut response teksten
            ajaxbox.innerHTML=this.responseText;
        }
    }
    //sender ajax requesten
    ajaxb.send();
}

//funskjon som bruker ajax for å vise bildet som er lastet opp 
//når man skriver inn bildenummer
function bildejs(element){
    //definerer variabler til senere referanse
    var display = document.getElementById("bildeDisplay");
    
    //definerer ajax
    var bildeajax = new XMLHttpRequest();
    
    //åpner ajax til riktig fil
    bildeajax.open("POST","getBilde.php?bildeNr="+element.value,"true");
    
    //definerer funksjonen som skjer når readystate endres
    bildeajax.onreadystatechange = function(){
        if(this.readyState==4&&this.status==200){
            //document.getElementById("bildeDisplay").innerHTML="<img src='"+this.responseText+"'>";
            
            //skriver ut bildet
            display.innerHTML="<img height='100px' src='"+this.responseText+"'>";
            //console.log(this.responseText);
        }
    }
    //sender requesten
    bildeajax.send();
}







