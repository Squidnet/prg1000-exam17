/*var input = document.getElementById("inp");

var ajax = new XMLHttpRequest();
ajax.open("POST","getYrkesgrupper.php",true);
ajax.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
        var temp = this.responseText.split(";");
        input.innerHTML = "";
        temp.pop();
        for(var n of temp){
            input.innerHTML+="<option value="+n+">"+n+"</option>";
        }
    }
}
ajax.send();*/