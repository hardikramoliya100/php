<!DOCTYPE html>
<html>
<body>

<h2>JavaScript For Of Loop</h2>
<p>The for of statement loops through the values of any iterable object:</p>

<p id="demo"></p>

<script>
const cars = ["BMW", "Volvo", "Mini"];

let text = "";
for (let x of cars) {
  text += x + "<br>";
}

document.getElementById("demo").innerHTML = text;
</script>

</body>
</html>
