<div class="jumbotron text-center">
    <h1 class="">ALL CETAGORY</h1>
    <div class="float-right mr-5">
        <a href="addcetagory" class="btn btn-primary">Add Cetagory</a>
    </div>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add course</a>
    </div>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead class="bg-dark text-light">
            <tr>
                <td>id</td>
                <td>category</td>

                <td>action</td>
            </tr>
        </thead>
        <tbody id="formdata">

        </tbody>
    </table>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add cetagory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post">

                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Enter Cetagory " class="form-control" name="cetagory" id="cetagory">

                        </div>
                    </div>


                    <div class="row mt-3 ">
                        <div class="col text-center">
                            <input type="submit" onclick="savedata()" class="btn btn-primary" name="save" id="save">

                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        fectchdata();
    });

    function fectchdata() {
        $.ajax({
            url: "showallcetagory",
            success: function(response) {
                data = JSON.parse(response)
                console.log(data);
                htmldata = "";
                a = 1;
                data.forEach(element => {
                    htmldata += `<tr>
                    <td>${a++}</td>
                    <td>${element.cetagory}</td>
                    <td>
                    <button onclick="editdata(${element.id} )" class="btn btn-success">Edit</button>
                    <a class="btn btn-sm btn-primary" href="editcetagory?id=${element.id}">Edit</a>
                    <button onclick="deletecetagory(${element.id})" class="btn btn-danger">delete</button>
                    </td>
                    
                    
                    </tr>
                    `

                });
                $('#formdata').html(htmldata)
            }
        })
    }

    function deletecetagory(id) {

        $.ajax({


            type: "post",
            data: {
                id: id
            },
            url: "deletecourse",
            success: function(response) {
                console.log(response);
                if (response == 1) {

                    fetchdata()
                } else {
                    alert("Error while inserting")
                }
            }
        })
    }

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
                if(response==1){
                    
                }
            }


        });

        
    }

    function editdata(id) {
        $('#myModal').modal('show');
        event.preventDefault()
        let token = $('#_token').val();
        $('#save').val('Edit course');
      $('.modal-title').text('Edit Course');
        
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{id:id,_token:token},
            url:"editcourse",
            success:function(response){
                $('#Teaching_Day').val(response.Teaching_Day);
                $('#Batch_Time').val(response.Batch_Time);
                $('#Course_Name').val(response.Course_Name);
                $('#Teacher_name').val(response.Teacher_name);
                $('#save').attr("onclick","updetdata("+response.id+")");
            }
        })

    }
</script>