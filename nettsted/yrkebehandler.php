<?php include("top.html"); ?>

<h2>Behandlere etter yrke:</h2><br>
<?php 


$fil2 = fopen("../pez/yrkesgruppe.txt","r");
while($linje2 = fgets($fil2)){
    if($linje2 != ""){
        $temp2 = explode(";",rtrim($linje2));
        $fil = fopen("../pez/behandler.txt","r");
        echo("<a id='overskrift'> <b>$temp2[0]:</b></a><br><br>");
        while($linje = fgets($fil)){
            if($linje != ""){
                $temp = explode(";",rtrim($linje));
                if($temp[3]==$temp2[0]){
                    $fil3 = fopen("../pez/bilde.txt","r");
                    while($linje3 = fgets($fil3)){
                        $temp3=explode(";", rtrim($linje3));
                        if($temp3[0]==$temp[4]){
                            
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
                            echo("<div id='behandler'><div id='maxbilde'>
                            <img id='behandlerbilde' src='../img/$temp3[2]' height='100px'></div> 
                            <div id='infobehandler'><a>| 
                            ID: <b>$temp[0]</b><br>| 
                            Fornavn: <b>$temp[1]</b><br>| 
                            Etternavn: <b>$temp[2]</b><br>| 
                            Anntall pasienter: <b> $antPas / $temp[5]</b>
                            <br>| <b>".(boolval($antPas/$temp[5]!=1) ? 'LEDIG' : 'IKKE LEDIG')."</b>
                            </div><br><br><br></a></div>");
                        }
                    }
                    continue;
                }
            }
        }
        echo("<br>");
        fclose($fil);
    }
}
fclose($fil2);

include("bot.html"); ?>