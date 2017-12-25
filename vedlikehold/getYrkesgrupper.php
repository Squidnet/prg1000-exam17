<?php

$file = fopen("../pez/yrkesgruppe.txt","r");
$temp = "";
while($line = rtrim(fgets($file))){
    $temp = $temp ."<option value=". $line . ">".$line."</option>";
}
echo($temp);
fclose($file);
?>