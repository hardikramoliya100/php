@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="form-group">
            <label for="bank_name">Bank Name</label>
            {{ Form::selectBank("bank_name",null,["class"=>"form-control"]) }}
        </div> -->
        <div class="col-md-8">
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
            <form method="POST">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add catogery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Enter Catagory" name="" id="">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <textarea class="form-control" placeholder="Enter Discription" name="diocription" id="diocription" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="savecatagorydata()" class="btn btn-primary">Save changes</button>
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
                    </tr>`
                    // console.log(element.category_description);
                });
                $("#DispCate").html(htmlTableData)
            }
        })
    })


    function savecatagorydata() {
        event.preventDefault()
        console.log('calling')

    }
</script>
@endpush