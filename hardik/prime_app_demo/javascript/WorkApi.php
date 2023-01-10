<!DOCTYPE html>
<html>
<body>

<h2>JavaScript Web Workers API</h2>
<p>Count numbers: <output id="result"></output></p>
<button onclick="startWorker()">Start Worker</button> 
<button onclick="stopWorker()">Stop Worker</button>

<script>
let w;

function startWorker() {
  if(typeof(w) == "undefined") {
    w = new Worker("demo_workers.js");
  }
  w.onmessage = function(event) {
    document.getElementById("result").innerHTML = event.data;
};
}

function stopWorker() { 
    w.terminate();
    w = undefined;
    document.getElementById("result").innerHTML = "";

}
</script>

</body>
</html>