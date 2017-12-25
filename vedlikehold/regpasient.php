<?php include("top.html"); ?>

<a id="overskrift">Registrer pasient</a><br><br>

<form method="POST" action="" id="regPasient" name="regPasient" onSubmit="return validerPasient()">
<table>
    <tr>
        <td>Fornavn:</td><td><input required type="text" id="fornavn" name="fornavn" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="Fornavn"></td></tr>
    <tr>
        <td>Etternavn:</td><td><input required type="text" id="etternavn" name="etternavn" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="Etternavn"></td></tr>
    <tr>
        <td>Pasient ID:</td><td><input required type="text" id="pasientId" name="pasientId" onFocus="fokus(this)" onBlur="nonfokus(this)" onMouseOver="hover(this)"
        onMouseOut="wipe()" placeholder="2-3 tegn"></td></tr>
    </table>

    <input type="submit" value="Fortsett" id="fortsett" name="fortsett">
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill"
    onClick="wipe()"><br><br>
</form>
<script src="regpasient.js"></script>

<?php
if(isset($_POST["fortsett"])){
    if(!$_POST["fornavn"]||
       !$_POST["etternavn"]||
       !$_POST["pasientId"]){
        echo("Du må fylle ut alle feltene!");
    }else if(strlen($_POST["pasientId"])!=2&&strlen($_POST["pasientId"])!=3){
        echo("Pasient ID må være 2 eller 3 lang.");
    } else {
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $pasientId = $_POST["pasientId"];
        
        $path = "../pez/pasient.txt";
        $metode = "a+";
        $fil = fopen($path,$metode);
        
        $lov=true;
        while($linje = fgets($fil)){
            if($linje!=""){
               $temp = explode(";",rtrim($linje));
                if(strtoupper($temp[0])==strtoupper($pasientId)){
                    echo("$pasientId er allerede i bruk!");
                    $lov=false;
                }
            }
        }
        if($lov){
            echo("Registrert!");
            fwrite($fil,"\n".strtoupper($pasientId).";$fornavn;$etternavn");
            fclose($fil);
        }
        
    }    
}   
    
include("bot.html"); ?>