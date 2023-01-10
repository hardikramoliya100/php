<!DOCTYPE html>
<html>
<body>

<h2>The XMLHttpRequest Object</h2>

<div id="demo">
<p>Let AJAX change this text.</p>
<button type="button" onclick="loadDoc()">Change Content</button>
</div>

<script>

function loadDoc(){

    xhttp = new XMLHttpRequest;

    xhttp.onload = function(event){
        document.getElementById("demo").innerHTML = this.responseText;
    }

    xhttp.open("GET","ajex_intro.txt");
    xhttp.send();

}

</script>

</body>
</html>