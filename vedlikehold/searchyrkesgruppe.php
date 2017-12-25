<?php include("top.html"); ?>

<a id="overskrift">Liste på behandlere basert på yrkessøk</a><br><br>
<table>
    <tr>
        <form action="" method="post" id="skjema" name="skjema">
            <td>
                <select id="inp" name="inp">
                    <?php include("getYrkesgrupper.php"); ?>
                </select>
            </td>
            <td>
                <input id="submit" name="submit" value="Fortsett" type="submit">
            </td>
        </form>
    </tr>
</table>
<!--script src="searchyrkesgruppe.js"></script-->
<?php

if(isset($_POST["submit"])){
    
    $file = fopen("../pez/behandler.txt","r");
    echo("<table>");
    echo("<tr>
    <td id='vis3'>ID:</td>
    <td id='vis3'>Fornavn:</td>
    <td id='vis3'>Etternavn:</td>
    <td id='vis3'>Yrkesgruppe:</td>
    <td id='vis3'>Bildenummer:</td>
    <td id='vis3'>Maks anntall pasienter:</td>
    </tr>");
    while($line = rtrim(fgets($file))){
        $temp = explode(";", $line);
        if($temp[3] == $_POST["inp"]){
            echo("<tr><td id='vis'>$temp[0]</td><td id='vis'>$temp[1]</td><td id='vis'>$temp[2]</td><td id='vis'>$temp[3]</td><td id='vis'>$temp[4]</td><td id='vis'>$temp[5]</td></tr>");
        }
    }
    echo("</table>");
    
    
    
    
}
    
    
include("bot.html"); ?>