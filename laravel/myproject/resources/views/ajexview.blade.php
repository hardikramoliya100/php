@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            All Ajex Data
                        </div>
                        <div class="col-md-2"><a class="btn btn-sm btn-info text-light" data-toggle="modal" data-target="#exampleModal">Ajex</a></div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>descritption</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="DispCate">

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" id="cetagory_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add catogery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" class="form-control" value={{csrf_token()}} name="_token" id="_token">
                            <input type="text" class="form-control" placeholder="Enter Catagory" name="cetagory_name" id="cetagory_name">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <textarea class="form-control" placeholder="Enter Discription" name="cetagory_discription" id="cetagory_discription" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  id="save" onclick="savecatagorydata()" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(window).on('load', function(e) {
        // alert("load")
        fetchdata()
    })

    function fetchdata(){
        $.ajax({
            url: "selectallcatogorydata",
            success: function(response) {
                console.log(response);
                htmlTableData = ""
                response.forEach(element => {
                    // console.log(element.category_title);
                    htmlTableData += `<tr>
                        <td>${element.id}</td>
                        <td>${element.cetagory_name}</td>
                        <td>${element.cetagory_discription}</td>
                        <td>
                        <button onclick="editdata(${element.id})">edit</button>
                        <button onclick="deletedata(${element.id})">delete</button>

                        </td>

                        
                    </tr>`
                    // console.log(element.category_description);
                });
                $("#DispCate").html(htmlTableData)
            }
        })
    }


    function savecatagorydata() {
        event.preventDefault()
        // let cetagory = document.getElementById("cetagory_name").value
        // let cetagory_discription =$("#cetagory_discription").val();

        // var formserialize = $('#cetagory_form').serialize();
        // var formserializeArray = $('#cetagory_form').serializeArray();

        var result = {};
        $.each($('#cetagory_form').serializeArray(), function() {
            result[this.name] = this.value;
        });

        console.log(result)
        // result.push({"_token":$('#_token').val()});

        // console.log(formserializeArray)
        $.ajax({
            type: "POST",
            dataType: "json",
            data:result,
            url:"savecetagory",
            success:function(response){
                console.log(response);
                if (response == 1) {
                    $('#exampleModal').modal('hide');
                    fetchdata()
                } else {
                    alert("Error while inserting")
                }
            }
        })


    }
    function editdata(id) {
        event.preventDefault()
        let token = $('#_token').val();
        
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{id:id,_token:token},
            url:"editcetagory",
            success:function(response){
                $('#exampleModal').modal('show');
                $('#cetagory_name').val(response.cetagory_name);
                $('#cetagory_discription').val(response.cetagory_discription);
                $('#save').attr("onclick","updetdata("+response.id+")");
            }
        })

    }

    function updetdata(id){
        event.preventDefault()
        var result = {};
        $.each($('#cetagory_form').serializeArray(), function() {
            result[this.name] = this.value;
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            data:result,
            url:`/updatedata/${id}`,
            success:function(response){
                console.log(response);
                if (response == 1) {
                    $('#exampleModal').modal('hide');
                    fetchdata()
                } else {
                    alert("Error while inserting")
                }
            }
        })
    }
    function deletedata(id){
       
        $.ajax({
            
            
            
            url:`/deletedata/${id}`,
            success:function(response){
                console.log(response);
                if (response == 1) {
                   
                    fetchdata()
                } else {
                    alert("Error while inserting")
                } 
            }
        })
    }
</script>
@endpush