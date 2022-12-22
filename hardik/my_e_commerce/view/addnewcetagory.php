
<div class="jumbotron text-center">
    <h1 class="">ADD CETAGORY</h1>
    <div class="float-right mr-5">
        <a href="cetagory" class="btn btn-primary">All Cetagory</a>
    </div>
</div><div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                        ADD CETAGORY
                        </div>
                        <div class="card-body">
                            <form method="post">

                                <div class="row">
                                    <div class="col">
                                        <input type="text"  placeholder="Enter Cetagory " class="form-control" name="cetagory" id="cetagory">
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="row mt-3 ">
                                    <div class="col text-center">
                                        <input type="submit"  onclick="savedata()" class="btn btn-primary" name="registration" id="registration">
                                        
                                    </div>
                                </div>
                            </form>
                            
                         </div>
                    </div>
                </div>
            </div>

        </div>
<script>
    function savedata(){
        event.preventDefault();
        var data ={
            cetagory:$('#cetagory').val(),
            
        };

        console.log(data);
        $.ajax({
            url:"newcetagorydata",
            type:"POST",
            data:data,
            success:function(response){
                data = JSON.parse(response)
                console.log(data);
               

                    if (data == 2) {
                        window.location.href="cetagory"
                    } else {
                        alert("Error")
                    }
            }


        });

        
    }
</script>