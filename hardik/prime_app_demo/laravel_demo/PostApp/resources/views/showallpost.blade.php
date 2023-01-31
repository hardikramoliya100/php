<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ resource_path('css/app.css') }}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" > -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <title>All Post</title>
</head>

<body>

    <div class="container mt-5 md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- {!! Session::has('msg') ? Session::get("msg") : '' !!} -->

        @if (Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get('success') }}</li>
            </ul>
        </div>
        @endif

        <h2 class="text-center">ALL POST</h2>
        <div>
            <a href="addpost" class="btn btn-success ">Add Post</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Import</button>
            <!-- <button type="button" class="btn btn-primary" onclick="exportdata()">Export</button> -->
            <a href="exportfile" class="btn btn-success">Export</a>
        </div>
        <!--  -->
        <table class="table table-bordered yajra-datatable">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/importfile" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" value={{csrf_token()}} name="_token" id="_token">
                            <div class="form-group">
                                <input class="form-control" type="file" name="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        // $(window).on('ready', function(e) {

        //     $('.dataTables_filter').addClass('float-right');
        // })
        $(document).ready(function() {
                $('.dataTables_filter').addClass('float-right');
                // $.fn.dataTableExt.oStdClasses["sFilter"] = "my-style-class";
        });
        $(window).on('load', function(e) {

            fetchdata()
        })

        function fetchdata() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                "bInfo" : false,
                lengthChange: false,
                // "lengthChange": false,
                // responsive: true,

                ajax: "{{ route('post.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'author',
                        name: 'author'
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
            $('.dataTables_filter').addClass('float-right');
        }


        function deletepost(id) {

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
    </script>
    <!-- <script>
        $('.dataTables_filter').addClass('float-right');
    </script> -->
</body>

</html>