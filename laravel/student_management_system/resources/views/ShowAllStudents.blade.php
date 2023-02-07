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
    <h1 class="bg-danger">Add New Student</h1>
    <div class="float-right mr-5">
      <a href="" class="btn btn-primary" onclick="submit()" data-toggle="modal" data-target="#myModal">Add Students</a>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <div class="list-group">
          <a href="courses" class="list-group-item list-group-item-action">courses</a>
          <a href="students" class="list-group-item list-group-item-action">Students</a>
          <a href="showmarks" class="list-group-item list-group-item-action">Result</a>
        </div>
      </div>
      <div class="col-10 ">
        <table class="table table-bordered" id="myTable">
          <thead class="bg-dark text-light">
            <tr>
              <td>Id</td>
              <td>Name</td>
              <td>Img</td>
              <td>Phone</td>
              <td>Course_Name</td>
              <td>Teacher_name</td>
              <td>Batch_Time</td>
              <td>Teaching_Day</td>
              <td>Edit</td>
              <td>Delete</td>
              <!-- <td>Mark</td> -->
            </tr>
          </thead>
          <tbody>
            @php
            $a=1;
            @endphp
            @foreach($students as $s)
            <tr>
              <td>{{$a}}</td>
              <td>{{$s->name}}</td>
              <td><img src="{{asset('uplode_img')}}/{{$s->img}}" alt="" height="150" width="150"></td>
              <td>{{$s->phone}}</td>
              <td>{{$s->mycourse[0]->Course_Name}}</td>
              <td>{{$s->mycourse[0]->Teacher_name}}</td>
              <td>{{$s->mycourse[0]->Batch_Time}}</td>
              <td>{{$s->mycourse[0]->Teaching_Day}}</td>
              <td>
                <a href="javascript::void(0)" data-id="{{$s->course_id}}" sid="{{$s->sid }}" class="btn btn-success showEditModal ">Edit</a>
              </td>
              <td>
                <a href="deletestudent/{{$s->id}}" class="btn btn-danger  ">Delete</a>
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
    <!-- @php
    flush();
    @endphp -->
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="savestudent" method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
              @csrf
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" id="name" onblur="chackreq(this,'nameerrer')">
              <span id="nameerrer"></span>
            </div>
            <div class="form-group">
              <label for="">Phone_Numder</label>
              <input type="text" class="form-control" name="phone" id="phone" onblur="chackreq(this,'phoneerrer')">
              <span id="phoneerrer"></span>
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" class="form-control" name="img" id="img">
            </div>
            <div class="form-group">
              <label for="">course_id</label>
              <!-- <input type="text" class="form-control" name="course_id" id="course_id"> -->
              <select name="course_id" id="course_id" class="form-control">
                <option selected disabled>-</option>
                @foreach($courses as $cou)
                <option value="{{$cou->id}}">{{$cou->Course_Name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" id="submit" value="Add student">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          </form>
        </div>



      </div>
    </div>
  </div>

  <div class="modal" id="mymarkModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-titles">Add Marks</h4>
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
              <!-- <input type="text" class="form-control" name="student_id" id="student_id" value="aaa"> -->
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
    function chackreq(e, spn) {
      if (e.value == "") {
        document.getElementById(spn).innerHTML = "This item is Requerd !!";
      } else {
        document.getElementById(spn).innerHTML = "";

      }
    }

    $(document).ready(function() {
      $('#myTable').DataTable();
    });

    function submit() {
      /*Put all the data posting code here*/
      document.getElementById("myModal").reset();
    }

    $('.showEditModal').click(function(e) {
      phone = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      // id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      course_id = e.target.getAttribute('data-id')
      id = e.target.getAttribute('sid')
      // console.log(course_id)

      $('#course_id').val(course_id);
      $('#name').val(name);
      $('#phone').val(phone);
      $('#submit').val('Edit Student');
      $('.modal-title').text('Edit Student');
      $('#form').attr('action', 'editstudent/' + id);
      $('#form').append('<input type="hidden" name="_method" value="POST" >')

      $('#myModal').modal('show');
    })

    $('.showmarkModal').click(function(e) {

      id = e.target.getAttribute('mid')
      // console.log(course_id)

      $('#student_id').val(id);
      $('#maths').val();
      $('#chemisty').val();
      $('#physics').val();
      $('#submit').val('Edit Mark');
      $('.modal-titles').text('Edit Mark');
      $('#form').attr('action', 'editmark/' + id);
      $('#form').append('<input type="hidden" name="_method" value="POST" >')

      $('#mymarkModal').modal('show');
    })
  </script>

</body>

</html>