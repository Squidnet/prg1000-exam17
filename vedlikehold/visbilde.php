<?php include("top.html");?>

<?php
        
$fil = fopen("../pez/bilde.txt","r");
    echo("<table>");
    echo("<a id='overskrift'>Bilder</a><br><br>");
    echo("<tr id='vis2'>
    <td id='vis3'><b>Bildenummer:</b></td>
    <td id='vis3'><b>Dato:</b></td>
    <td id='vis3'><b>Filnavn:</b></td>
    <td id3='vis'><b>Beskrivelse:</b></td></tr>");
    while($linje = fgets($fil)){
        if($linje != ""){
            $temp = explode(";",rtrim($linje));
            echo("<tr id='vis2'>
            <td id='vis'>$temp[0]</td>
            <td id='vis'>$temp[1]</td>
            <td id='vis'>$temp[2]</td>
            <td id='vis'>$temp[3]</td></tr>");
        }
    }
    echo("</table>"); 
    
    fclose($fil);
    
include("bot.html"); ?>