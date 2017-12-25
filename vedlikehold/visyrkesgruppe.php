<?php include("top.html"); ?>

<?php


$filnavn= fopen("../pez/yrkesgruppe.txt","r");
echo("<table>");

echo("<a id='overskrift'>Yrkesgrupper</a><br><br>");

while($linje=fgets($filnavn)){
    if($linje != ""){
        
        echo("<tr><td id='vis'>$linje</td></tr>");
    }
}

echo("</table>");

fclose($filnavn);


include("bot.html"); ?>