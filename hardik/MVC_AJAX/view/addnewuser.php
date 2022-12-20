<form method="POST" id="form">
    <label for="">firstname</label><br>
    <input type="text" name="firstname" id="firstname"><br>
    <label for="">lastname</label><br>
    <input type="text" name="lastname" id="lastname"><br>
    <label for="">email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="">mobile</label><br>
    <input type="text" name="mobile" id="mobile"><br>

    <input type="submit" onclick="savedata()" value="save" name="save" id="save">
</form>

<script>

    function savedata(){
        event.preventDefault();
        var data ={
            firstname:$('#firstname').val(),
            lastname:$('#lastname').val(),
            email:$('#email').val(),
            mobile:$('#mobile').val(),
        };

        console.log(data);
        $.ajax({
            url:"newuserdata",
            type:"POST",
            data:data,
            // dataType:"json",
            success:function(response){

            }


        });
        
    }
</script>