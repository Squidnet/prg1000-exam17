<?php include("top.html"); ?>

<a id="overskrift">Registrer behandler</a><br><br>

<form method="POST" action="" id="regBehandler" name="regBehandler" onSubmit="return validerBehandler()">
<table>
    <tr><td>Behandler ID:</td><td><input required type="text" id="bid" name="bid" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" placeholder="2-3 tegn"></td></tr>
    <tr><td>Fornavn:</td><td><input required type="text" id="fornavn" name="fornavn" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" placeholder="Fornavn"></td></tr>
    <tr><td>Etternavn:</td><td><input required type="text" id="etternavn" name="etternavn" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" placeholder="Etternavn"></td></tr>
    <tr><td>Yrkesgruppe:</td><td><input required type="text" id="yrke" name="yrke" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" onKeyUp="behandlerajax();" placeholder="Yrke"></td></tr>
    <tr><td>Bilde nr:</td><td><input onKeyUp="bildejs(this);" required type="text" id="bildeNr" name="bildeNr" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" placeholder="3 tall"></td>
    <td><div id="bildeDisplay" name="bildeDisplay"></div></td></tr>
    <tr><td>Maks antall pasienter:</td><td><input required type="text" id="maksAntallPasienter" name="maksAntallPasienter" onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this)" onBlur="nonfokus(this)" placeholder="Fler enn 0"></td>
    </tr>
    </table>

    <input type="submit" id="submit" name="submit" value="Fortsett">
    <input type="reset" id="reset" name="reset" value="Nullstill" onClick="wipe(); wipeAjax();">

</form>
<br>
<script src="regbehandler.js"></script>

<?php
$filnavn="../pez/yrkesgruppe.txt";
$mode = "r";
$yrkesFile = fopen($filnavn,$mode);
$skriveFile = fopen("../pez/behandler.txt","a+");

function validerYrke($yrkesFile){
    while($linje = rtrim(fgets($yrkesFile))){
        if(strtoupper($linje) == strtoupper($_POST["yrke"])){
            return false;
        }
    }
    return true;
}
   
if(isset($_POST["submit"])){
    if($_POST["maksAntallPasienter"]<1){
        echo("Max antall pasienter må være større enn 0");
    } else if(!$_POST["bid"]||
       !$_POST["fornavn"]||
       !$_POST["etternavn"]||
       !$_POST["yrke"]||
       !$_POST["bildeNr"]||
       !$_POST["maksAntallPasienter"]){
        echo("Du må fylle ut alle feltene!");
    } else if(!(strlen($_POST["bid"])==3||
                strlen($_POST["bid"])==2)){
        echo("Behandler id kan bare være 2 eller 3 tegn!");
    }
    else if(validerYrke($yrkesFile)){
        echo("Yrket eksisterer ikke. Registrer nytt yrke <a href='regyrkesgruppe.php'>her</a>");
    } else if(strlen($_POST["bildeNr"])!=3||
              !is_numeric($_POST["bildeNr"])){
        echo("Bildenummer må bestå av <b>3 tall!</b>");
    } else {
        $bid = $_POST["bid"];
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $yrke = $_POST["yrke"];
        $bildeNr = $_POST["bildeNr"];
        $MAP = $_POST["maksAntallPasienter"];
        
        $lov = false;
        $lov2 = true;
        
        $bildefil = fopen("../pez/bilde.txt","r");
        
        while($linje = fgets($bildefil)){
            if ($linje != ""){
                $temp = explode(";",rtrim($linje));
                if($temp[0]==$bildeNr){
                    $lov = true;
                }
            }
        }
        
        while($linje = fgets($skriveFile)){
            if ($linje != ""){
                $temp = explode(";",rtrim($linje));
                if(strtoupper($temp[0])==strtoupper($bid)){
                    $lov2 = false;
                }
            }
        }
        
        
        
        if($lov && $lov2){
            fwrite($skriveFile,"\n".strtoupper($bid).";$fornavn;$etternavn;".strtoupper($yrke).";$bildeNr;$MAP");
            echo("Registrert!");
        } else if(!$lov){
            echo("Bildet er ikke registrert! Registrer bilde <a href='regbilde.php'>her</a>!<br>");
       } else if(!($lov2)){
            echo("Behandler ID'en er allerede i bruk!<br>");
        } else {
            echo("HÆ?!");
        }
        
    
        fclose($skriveFile);
        fclose($bildefil);
    }    
}



include("bot.html"); ?>