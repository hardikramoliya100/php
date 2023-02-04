@extends('layouts.app')
@extends('header.header')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
            @can('post-create')
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Product </a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row mt-2">
    <div class="col-lg-12">
        <div class="float-right" id="newSearchPlace"></div>
    </div>
</div>

<table class="table table-bordered mt-3 yajra-datatable">
    <thead class="bg-dark text-light">
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>slug</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Discription</th>
            <th>Status</th>
            <th>Publich Date</th>
            <th width="190px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
 

    $(window).on('load', function(e) {

        fetchdata()
    })

    function fetchdata() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            "bInfo": false,
            "searching": true,
            lengthChange: false,


            ajax: "{{ route('post.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'tag',
                    name: 'tag'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

        $("#newSearchPlace").html($(".dataTables_filter"));

    }
 
    function deletepost(id) {
        if(confirm("Are You Sure to delete this")){

            $.ajax({
                url: 'deletepost/' + id,
                success: function(response) {
                    if (response == 1) {
                        $('.yajra-datatable').DataTable().destroy();
                        alert('post was delete');
                        fetchdata();
                    } else {
                        alert("somting Wrong");
                    }
                }
            })
        }
    }
</script>

@endsection