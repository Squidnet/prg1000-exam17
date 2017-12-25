<?php include("top.html"); ?>

<a id="overskrift">Registrer yrkesgruppe</a>
<br><br>

<form method="post" action="" id="regYrkesGruppe" name="regYrkesGruppe" onSubmit="return validerYrkesgruppe()"> 
<table>
    <tr><td>Yrke:</td><td><input required onMouseOver="hover(this);" onMouseOut="wipe();" onFocus="fokus(this);" onBlur="nonFokus(this);" type="text" id="yrke" name="yrke" placeholder="Yrke"></td></tr>
    </table>
    
    <input type="submit" value="Fortsett" id="fortsett" name="fortsett">
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="wipe()"><br><br>
</form>
<script src="regyrkesgruppe.js"></script>

<?php
if (isset($_POST["fortsett"])){
    $yrke=$_POST["yrke"];    

    if(!$_POST["yrke"])
    { 
        echo("Vennligst fyll inn yrke.");
    }

    else{
        $fil=fopen("../pez/yrkesgruppe.txt", "a+");
        $yrkesgruppe=array();
        $flag=true;

        while($linje=fgets($fil)){
            if($linje!="")
                array_push($yrkesgruppe,rtrim($linje));
        }
        foreach ($yrkesgruppe as $del){
            if(strtoupper($yrke) == $del){
                echo("$yrke er allerede anngitt.");
                $flag=false;
            }
        }
        if($flag){
            echo("$yrke er registrert.");
            fwrite ($fil,"\n".strtoupper($yrke));
            fclose ($fil);
        }
        
    }
}
   
include("bot.html"); ?>