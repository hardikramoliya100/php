<!DOCTYPE html>
<html>
<body>


<p>This example shows an Arrow Function with a parameter.</p>

<p id="demo"></p>

<script>
let hello = "";

hello = (val) => "Hello " + val;

document.getElementById("demo").innerHTML = hello("Universe!");
</script>

</body>
</html>