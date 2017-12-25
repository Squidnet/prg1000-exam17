<?php include("top.html"); ?>
<a id="overskrift">Registrer bilde</a>
<br>
<br>
<form method="POST" action="" id="regBilde" name="regBilde" onSubmit="return validerBilde();" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Last opp:</td>
            <td><input required type="file" id="lastopp" name="lastopp" onMouseOver="hover(this);" onMouseOut="wipe();"></td>
        
        </tr>
        
        <tr>
            <td>Bilde nr:</td>
            <td><input required id="bildeNr" onFocus="fokus(this)" onBlur="nonfokus(this)"  onMouseOver="hover(this);" onMouseOut="wipe();" name="bildeNr" type="text" placeholder="3 tall"></td>
        </tr>
        <tr>
            <td>Dato:</td>
            <td><input required type="date"  onFocus="fokus(this)" onBlur="nonfokus(this)" id="dato" name="dato" onMouseOver="hover(this);" onMouseOut="wipe();"> (Hvis du må skrive for hånd, format: ÅÅÅÅ-MM-DD)</td>
        </tr>
        <tr>
            <td>Filnavn:</td>
            <td><input required type="text" onFocus="fokus(this)" onBlur="nonfokus(this)"  id="filnavn" name="filnavn" onMouseOver="hover(this);" onMouseOut="wipe();" placeholder="Filnavn"> .jpg</td>
        </tr>
        <tr>
            <td>Beskrivelse:</td>
            <td><input required type="text" onFocus="fokus(this)" onBlur="nonfokus(this)"  id="beskrivelse" name="beskrivelse" onMouseOver="hover(this);" onMouseOut="wipe();" placeholder="Bildebeskrivelse"></td>
        </tr>
    </table>
    
    <input type="submit" id="submit" name="submit" value="Fortsett"> 
    <input type="reset" id="reset" name="reset" value="Nullstill" onclick="wipe();">
</form>
<script src="regbilde.js"></script>
<?php
if(isset($_POST["submit"])){
    if(!$_POST["bildeNr"]||
       !$_POST["dato"]||
       !$_POST["filnavn"]||
       !$_POST["beskrivelse"]){
        echo("Du må fylle ut alle feltene!");
    } else {
        $bildeNr = $_POST["bildeNr"];
        $dato = $_POST["dato"];
        $filnavn = $_POST["filnavn"];
        $beskrivelse = $_POST["beskrivelse"];
        
        $metode = "a+";
        $path = "../pez/bilde.txt";
        $fil = fopen($path,$metode);
        
        if(!(is_numeric(substr($dato,0,4))&&
             substr($dato,4,1)=="-"&&
             is_numeric(substr($dato,5,2))&&
             substr($dato,7,1)=="-"&&
             is_numeric(substr($dato,8,2)))){
            echo("Dato må være på formatet <b>'ÅÅÅÅ-MM-DD'</b>");
        } else if(!(substr($dato,5,2)<=12&&
                    substr($dato,5,2)>0&&
                    substr($dato,8,2)<=31&&
                    substr($dato,8,2)>0)){
            echo("Pass på at måneden er fra 1 til 12 (ikke over eller under) og at dag ikke er større enn 31 eller mindre enn 1!");
        }else if(strlen($bildeNr)!=3||!is_numeric($bildeNr)){
            echo("Bildenummer må bestå av <b>3 tall!</b>");
        } else {
            $lov = true;
            while($linje = fgets($fil)){
                if($linje!=""){
                    $temp = explode(";",rtrim($linje));
                    if($temp[0]==$bildeNr){
                        echo("Bildenummer $bildeNr er allerede brukt!");
                        $lov = false;
                    }
                }
            }
            if($lov){
                $bildeMappe = "../img/";
                $bildeFilen = $_FILES["lastopp"]["name"];
                $bildeFil = $bildeMappe . basename($bildeFilen);

                $lovlig = true;
                $filType = pathinfo($bildeFil,PATHINFO_EXTENSION);
                
                if($bildeFil != "../img/"){

                    if(file_exists($bildeFil)){
                        echo("Sorry, bildet eksisterer allerede<br>");
                        $lovlig = false;
                    }

                    if($filType != "jpg"){
                        echo("Bare .jpg filer er tillat");
                        $lovlig = false;
                    }

                    if(!$lovlig){
                        echo("Filen ble ikke lastet opp!");
                    } else {
                        if(move_uploaded_file($_FILES["lastopp"]["tmp_name"],$bildeFil)){
                            echo("Registrert!<br>");
                            fwrite($fil,"\n$bildeNr;$dato;$filnavn.jpg;$beskrivelse");
                            echo("Bildet ".basename($_FILES["lastopp"]["name"])." har blitt lastet opp");
                            rename("../img/".$bildeFil, "../img/".$filnavn.".jpg");
                        } else {
                            echo("ERROR: fil ikke lastet opp..");
                        }
                    }
                } else {
                    echo("Du må laste opp en fil!");
                }
            }
        }
    fclose($fil);
    }
}


include("bot.html"); ?>













