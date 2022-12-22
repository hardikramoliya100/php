
<div class="jumbotron text-center">
<h1 class="">EDIT CETAGORY</h1>
<div class="float-right mr-5">
    <a href="cetagory" class="btn btn-primary">edit Cetagory</a>
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
                                <input type="hidden" id="id" name="id" >
                                <div class="col">
                                    <input type="text" class="form-control"  name="cetagory" id="cetagory">
                                    
                                </div>
                            </div>
                            
                            
                            <div class="row mt-3 ">
                                <div class="col text-center">
                                    <input type="submit"  onclick="editdata()" class="btn btn-primary" name="edit" id="edit">
                                    
                                </div>
                            </div>
                        </form>
                        
                     </div>
                </div>
            </div>
        </div>

    </div>
<script>

$(window).on('load', function(e) {
      
      update()
    })

    function update(){
        var id=<?php echo $id;?>;

        $.ajax({
            type: "POST",
            data:{id:id},
            url:"fetcheditdata",
            success:function(response){
                data = JSON.parse(response)
                console.log(data );
                $('#cetagory').val(data.cetagory);
                $('#id').val(data.id);
                
            }
        })
    }

function editdata(){
    event.preventDefault();
    var data ={
        id:$('#id').val(),
        cetagory:$('#cetagory').val(),
        
    };

    console.log(data);
    $.ajax({
        type:"POST",
        data:data,
        url:"editdatacetagory",
        success:function(response){
            data = JSON.parse(response)
            console.log(data);
            

                if(data==2){
                    window.location.href="cetagory"
                }
        }


    });

    
}
</script>