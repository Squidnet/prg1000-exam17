function validerYrkesgruppe(){
    //definerer variabler for senere referanse
    var yrke = document.getElementById("yrke");
    var infotext = document.getElementById("infotxt");
    
    //console.log(yrke.value);
    
    //skjekker at yrket er fyllt ut
    if(yrke.value == ""){
        infotext.style.color="red";
        infotext.innerHTML = "Du må fylle ut feltet i <b>Yrke!</b>";
        return false;
    }
}



/*function validerYrkesgruppe(yrke)
{
var lovligYrkeTom=true;
    
    if(!fornavn)
        {
            lovligYrkeTom=false;
        }
    return lovligYrkeTom;
}

function validerYrkesgruppe()
{
    
    var yrke = document.getElementById("yrke").value;
    var lovligYrkeTom = validerYrke(yrke);
    var feilmelding="";
    if(!lovligYrkeTom)
    {
        feilmelding="Feltet er tomt!<br>";
        document.getElementById("infotxt").style.color="red";
        document.getElementById("infotxt").innerHTML=feilmelding;
        return false;
    }
    
}*/