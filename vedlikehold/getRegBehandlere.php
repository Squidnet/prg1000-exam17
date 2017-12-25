<?php

$inp = $_REQUEST["yrke"];

$file = fopen("../pez/behandler.txt","r");
echo("<br>Følgende personer fra yrke <b>".$inp."</b> eksisterer allerede: <br><br>");
while($line = rtrim(fgets($file))){
    if($line!=""){
        $line = explode(";", $line);
        if(strtoupper($line[3])==strtoupper($inp)){
            echo("<b>".$line[0].", ".$line[1]." ".$line[2]."</b><br>");
        }
    }
}
?>