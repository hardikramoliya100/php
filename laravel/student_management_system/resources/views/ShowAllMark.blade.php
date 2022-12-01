<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stduent Managmernt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <div class="jumbotron text-center">
        <h1 class="bg-danger">Students Mark</h1>
        <div class="float-right mr-5">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Students Mark</a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="courses" class="list-group-item list-group-item-action">courses</a>
                    <a href="students" class="list-group-item list-group-item-action">Students</a>
                </div>
            </div>
            <div class="col-10 ">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-dark text-light">
                        <tr>
                            <td>Id</td>
                            <td>student_Name</td>
                            <td>physics</td>
                            <td>maths</td>
                            <td>chemisty</td>
                            <td>Edit</td>
                            <td>Delete</td>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $a=1;
                        @endphp
                        @foreach($mark as $m)
                        <tr>
                            <td>{{$a}}</td>
                            <td>{{$m->mystudent[0]->name}}</td>
                            <td>{{$m->physics}}</td>
                            <td>{{$m->maths}}</td>
                            <td>{{$m->chemisty}}</td>
                            <td>
                                <a href="javascript::void(0)" mark-id="{{$m->student_id}}" mid="{{$m->id }}" class="btn btn-success showeditModal ">Edit</a>
                            </td>
                            <td>
                                <a href="deletemark/{{$m->id}}" class="btn btn-danger ">Delete</a>

                            </td>


                        </tr>
                        @php
                        $a++;
                        @endphp
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Marks</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="savemark" method="POST" id="form">
                        <div class="form-group">
                            @csrf
                            <label for="">physics</label>
                            <input type="number" class="form-control" name="physics" id="physics">

                        </div>
                        <div class="form-group">
                            <label for="">maths</label>
                            <input type="number" class="form-control" name="maths" id="maths">

                        </div>

                        <div class="form-group">
                            <label for="">chemisty</label>
                            <input type="number" class="form-control" name="chemisty" id="chemisty">

                        </div>

                        <div class="form-group">
                            <label for="">student_id</label>
                            <!-- <input type="text" class="form-control" name="course_id" id="course_id"> -->
                            <select name="student_id" id="student_id" class="form-control">
                                <option selected disabled>-</option>
                                @foreach($students as $stu)
                                <option value="{{$stu->id}}">{{$stu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control" id="submit" value="Add student">

                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $('.showeditModal').click(function(e) {
            chemisty = e.target.parentElement.previousElementSibling.innerText
            maths = e.target.parentElement.previousElementSibling.previousElementSibling.innerText
            physics = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText
            student_id = e.target.getAttribute('mark-id')
            id = e.target.getAttribute('mid')
            // console.log(course_id)

            $('#student_id').val(student_id);
            $('#maths').val(maths);
            $('#chemisty').val(chemisty);
            $('#physics').val(physics);
            $('#submit').val('Edit Mark');
            $('.modal-title').text('Edit Mark');
            $('#form').attr('action', 'editmark/' + id);
            $('#form').append('<input type="hidden" name="_method" value="POST" >')

            $('#myModal').modal('show');
        })
    </script>




</body>

</html>