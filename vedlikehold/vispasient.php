<?php include("top.html"); ?>

<?php

$fil = fopen("../pez/pasient.txt","r");
    echo("<table>");
    echo("<a id='overskrift'>Pasienter</a><br><br>");
    echo("<tr id='vis2'>
    <td id='vis3'>ID:</td>
    <td id='vis3'>Fornavn:</td>
    <td id='vis3'>Etternavn:</td></tr>");
    while($linje = fgets($fil)){
        if($linje != ""){
            $temp = explode(";",rtrim($linje));
            echo("<tr id='vis2'>
            <td id='vis'>$temp[0]</td>
            <td id='vis'>$temp[1]</td>
            <td id='vis'>$temp[2]</td></tr>");
        }
    }
    echo("</table>");

      
include("bot.html"); ?>