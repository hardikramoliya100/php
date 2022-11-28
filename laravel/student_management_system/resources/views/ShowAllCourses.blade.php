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
    <h1 class="bg-danger">Add New Course</h1>
    <div class="float-right mr-5">
      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add course</a>
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
      <div class="col-10 " >
        <table class="table table-bordered" id="myTable">
          <thead class="bg-dark text-light">
            <tr>
              <td>Id</td>
              <td>Course_Name</td>
              <td>Teacher_name</td>
              <td>Batch_Time</td>
              <td>Teaching_Day</td>
              <td>Edit</td>
              <td>Delete</td>
            </tr>
          </thead>
          <tbody>
            @foreach($courses as $c)
            <tr>
              <td>{{$c->id }}</td>
              <td>{{$c->Course_Name }}</td>
              <td>{{$c->Teacher_name }}</td>
              <td>{{$c->Batch_Time }}</td>
              <td>{{$c->Teaching_Day }}</td>
              <td>
                <a href="javascript::void(0)" cid="{{$c->id }}" class="btn btn-success showEditModal ">Edit</a>
              </td>
              <td>
                <a href="deletecourse/{{$c->id}}" class="btn btn-danger  ">Delete</a>

              </td>
            </tr>
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
          <h4 class="modal-title">Add course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="savecourse" method="POST" id="form">
            <div class="form-group">
              @csrf
              <label for="">Course_Name</label>
              <input type="text" class="form-control" name="Course_Name" id="Course_Name">
            </div>
            <div class="form-group">
              <label for="">Teacher_name</label>
              <input type="text" class="form-control" name="Teacher_name" id="Teacher_name">
            </div>
            <div class="form-group">
              <label for="">Batch_Time</label>
              <input type="text" class="form-control" name="Batch_Time" id="Batch_Time">
            </div>
            <div class="form-group">
              <label for="">Teaching_Day</label>
              <input type="text" class="form-control" name="Teaching_Day" id="Teaching_Day">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" id="submit" value="Add course">
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

    $('.showEditModal').click(function(e) {
      Teaching_Day = e.target.parentElement.previousElementSibling.innerText
      Batch_Time = e.target.parentElement.previousElementSibling.previousElementSibling.innerText
      Teacher_name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      Course_Name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      // id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      id = e.target.getAttribute('cid')
      console.log(id)

      $('#Course_Name').val(Course_Name);
      $('#Batch_Time').val(Batch_Time);
      $('#Teaching_Day').val(Teaching_Day);
      $('#Teacher_name').val(Teacher_name);
      $('#submit').val('Edit course');
      $('.modal-title').text('Edit Course');
      $('#form').attr('action', 'editcourse/' + id);
      $('#form').append('<input type="hidden" name="_method" value="POST" >')

      $('#myModal').modal('show');
    })
  </script>

</body>

</html>