<?php include("top.html"); ?>

<h2>Registrer pasient</h2>

<form method="POST" action="" id="skjema" name="skjema" onSubmit="return validerPasient()">
    <table>
        <tr>
            <td>Pasient ID</td>
            <td><input type="text" id="pasientId" name="pasientId" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="2-3 tegn" required></td>
            <td>(Du må være registrert som pasient for å få en behandler)</td>
        </tr>
        <tr>
            <td>Fornavn</td>
            <td><input type="text" id="fornavn" name="fornavn" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="Fornavn" required></td>
        </tr>
        <tr>
            <td>Etternavn</td>
            <td><input type="text" id="etternavn" name="etternavn"onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="Etternavn" required></td>
        </tr>
        <tr>
            <td>Behandler ID</td>
            <td><input type="text" id="behandlerId" name="behandlerId" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="2-3 tegn" required></td>
        </tr>
    </table>
    <input type="submit" value="Fortsett" name="submit" id="submit">
    <input type="reset" value="Nullstill" onClick="wipe()">
</form><br>

<script src="regpasient.js"></script>

<?php 
    
if(isset($_POST["submit"])){
    
    //tester om alle variablene er fyllt ut
    if(!$_POST["fornavn"]||!$_POST["pasientId"]||!$_POST["etternavn"]||!$_POST["behandlerId"]){
        echo("DU MÅ FYLLE UT FELTENE!");
    } else {
        
        //lager variabler for senere referanse
        $pasientId = $_POST["pasientId"];
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $behandlerId = $_POST["behandlerId"];
        
        //tester at pasient iden og behanlder ID'en er godkjennt (2 eller 3 i lengde)
        if(strlen($pasientId)!=2&&strlen($pasientId)!=3){
            echo("Pasient ID'en må være 2 eller 3 i lengden! Æ, ø eller å er ikke tilatt!");
        } else if(strlen($behandlerId)!=2&&strlen($behandlerId)!=3) {
            echo("Behandler ID'en må være 2 eller 3 i lengden! Æ, ø eller å er ikke tilatt!");
        } else if(behandlerLedig($behandlerId)&& pasientIdLovlig($pasientId, $behandlerId)){
            echo("Registrert!");
            $pasientFil = fopen("../pez/pasientregistrering.txt","a+");
            fwrite($pasientFil,"\n".strtoupper($pasientId).";$fornavn;$etternavn;".strtoupper($behandlerId));
            fclose($pasientFil);
        }
    }
}

//funksjon for å teste om pasientId allerede er registrert
function pasientIdLovlig($pasientId, $behandlerId){
    $lov=false;
    $pasientFil = fopen("../pez/pasient.txt","r");
    
    while($line = fgets($pasientFil)){
        if($line!=""){
            $temp = explode(";", rtrim($line));
            if(strtoupper($temp[0]) == strtoupper($pasientId)){
                $lov=true;
            }
        }
    }
    
    $pasientRegFil = fopen("../pez/pasientregistrering.txt","r");
    
    while($line = fgets($pasientRegFil)){
        if($line!=""){
            $temp = explode(";", rtrim($line));
            if(strtoupper($temp[0]) == strtoupper($pasientId)){
                if(strtoupper($temp[3])==strtoupper($behandlerId)){
                    $lov=false;
                }
            }
        }
    }
    
    
    
    if($lov==false){
        echo("Pasient ID'en er ikke registrert (kontakt din lege!), eller så er du allerede registrert på denne behandleren!");
    }
    
    fclose($pasientFil);
    fclose($pasientRegFil);
    return $lov;
}

//tester om behandler id er i bruk eller om behandleren er opptatt eller ikke
function behandlerLedig($behandlerId){
    $lov=true;
    
    $pasientFil = fopen("../pez/pasientregistrering.txt","r");
    $antPasienter = 0;
    
    //leser igjennom pasientfila og teller alle pasienter med riktig behandler id
    while($line2 = fgets($pasientFil)){
        if($line2 != ""){
            $temp2 = explode(";",rtrim($line2));
            if(strtoupper($temp2[3])==strtoupper($behandlerId)){
                $antPasienter++;
            }
        }
    }
    fclose($pasientFil);
    
    $behandlerEksisterer = false;
    $behandlerFil = fopen("../pez/behandler.txt","r");
    
    //leser gjennom behandlerfila og skjekker om behandleren er fullbooket og om behandleren eksisterer
    while($line = fgets($behandlerFil)){
        if($line!=""){
            $temp = explode(";",rtrim($line));
            if(strtoupper($temp[0])==strtoupper($behandlerId)){
                $behandlerEksisterer = true;
                if($temp[5]<=$antPasienter){
                    $lov = false;
                    echo("Behandleren er fullbooket!");
                }
            }
        }
    }
    fclose($behandlerFil);
    
    //hvis behandleren ikke eksisterer så skriver den det ut
    if(!$behandlerEksisterer){
        echo("Behandlerern eksisterer ikke!");
        $lov = false;
    }
    
    return $lov;
}



include("bot.html"); ?>










