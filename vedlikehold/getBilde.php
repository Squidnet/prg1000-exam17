<?php 

$bildeNr = $_REQUEST["bildeNr"];
if(strlen($bildeNr)==3){
    $file = fopen("../pez/bilde.txt","r");

    while($line = fgets($file)){
        $temp = explode(";",rtrim($line));
        if($temp[0]==$bildeNr){
            echo("../img/".$temp[2]);
        }
    }
    fclose($file);
}

    
?>