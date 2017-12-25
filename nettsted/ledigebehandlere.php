<?php include("top.html"); ?>

<h2>Ledige behandlere:</h2><br>

<form method="POST" action="" id="skjema" name="skjema" onSubmit="return valider()">
    
    Behandler ID: <input type="text" name="behanlerId" id="behandlerId" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="2-3 tegn"> <input type="submit" id="submit" name="submit" value="Fortsett"><br><br>
    
    
</form>
<br>
<script src="validerbehandler.js"></script>
<?php

if(isset($_POST["submit"])){
    //åpner yrkesgruppe.txt for å lese gjennom yrkesgrupper
    $fil2 = fopen("../pez/yrkesgruppe.txt","r");
    while($linje2 = fgets($fil2)){
        if($linje2 != ""){
            $temp2 = explode(";",rtrim($linje2));
            
            //åpner behandler .txt for å lese igjennom alle behandlere
            $fil = fopen("../pez/behandler.txt","r");
            while($linje = fgets($fil)){
                if($linje != ""){
                    $temp = explode(";",rtrim($linje));
                    
                    //hvis behandleren sin yrke er lik yrket så gå videre, hvis ikke neste behandler
                    if($temp[3]==$temp2[0]){
                        
                        //åpner bilde.txt for å finne riktig bilde til riktig behandler
                        $fil3 = fopen("../pez/bilde.txt","r");
                        while($linje3 = fgets($fil3)){
                            $temp3=explode(";", rtrim($linje3));
                            
                            //skjekker at bildenummer macher bildenummer i behandler
                            if($temp3[0]==$temp[4]){
                                
                                //åpner pasientfilen for å skjekke hvor mange pasienter som er lagt inn 
                                //for behandleren.
                                $pasientFil = fopen("../pez/pasientregistrering.txt","r");
                                $antPas = 0;
                                while($pasLine = fgets($pasientFil)){
                                    if($pasLine != ""){
                                        $pasTemp = explode(";", rtrim($pasLine));
                                        if(strtoupper($pasTemp[3])==strtoupper($temp[0])){
                                            $antPas++;
                                        }
                                    }
                                }
                                fclose($pasientFil);
                                
                                //echo($temp[0].":".$_POST["behanlerId"]);
                                
                                //skriver ut behandleren hvis den er lik søket
                                if(strtoupper($temp[0])==strtoupper($_POST["behanlerId"])){
                                    echo("<a id='overskrift'><b>$temp2[0]:</b></a><br><br>");
                                    echo("<div id='behandler'>
                                    <div id='maxbilde'>
                                    <img id='behandlerbilde'src='../img/$temp3[2]' height='100px'>
                                    </div> 
                                    <div id='infobehandler'>
                                    <a>| ID: <b>$temp[0]</b><br>
                                    | Fornavn: <b>$temp[1]</b><br>
                                    | Etternavn: <b>$temp[2]</b><br>
                                    | Anntall pasienter: <b> $antPas / $temp[5]</b>
                                    <br>| <b>"/*inline test for å skrive ut enten "ledig" eller "ikke ledig"*/.(boolval($antPas/$temp[5]!=1) ? 'LEDIG' : 'IKKE LEDIG')."</b>
                                    </div></a>
                                    </div>");
                                }
                            }
                        }
                        continue;
                    }
                }
            }
            fclose($fil);
        }
    }
    fclose($fil2);
}

include("bot.html"); ?>