<?php include("top.html"); ?>

<?php

$fil = fopen("../pez/behandler.txt","r");
    echo("<table>");
    echo("<a id='overskrift'>Behandlere</a><br><br>");
    echo("<tr id='vis2'>
    <td id='vis3'>ID:</td>
    <td id='vis3'>Fornavn:</td>
    <td id='vis3'>Etternavn:</td>
    <td id='vis3'>Yrke:</td>
    <td id='vis3'>Bilde nr:</td>
    <td id='vis3'>Maks antall pasienter:</td></tr>");
    while($linje = fgets($fil)){
        if($linje != ""){
            $temp = explode(";",rtrim($linje));
            echo("<tr id='vis2'>
            <td id='vis'>$temp[0]</td>
            <td id='vis'>$temp[1]</td><td id='vis'>$temp[2]</td>
            <td id='vis'>$temp[3]</td>
            <td id='vis'>$temp[4]</td>
            <td id='vis'>$temp[5]</td></tr>");
        }
    }
    echo("</table>");
    
    
include("bot.html"); ?>