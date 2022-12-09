<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stduent Managmernt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
          <a href="showmarks" class="list-group-item list-group-item-action">Result</a>
        </div>
      </div>
      <div class="col-10 ">
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
          
          <tbody id="DispCourse">
            
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
          <form action="" method="POST" id="form">
            <div class="form-group">
              
              <input type="text" class="form-control" value={{csrf_token()}} name="_token" id="_token">
              <label for="">Course_Name</label>
              <input type="text" class="form-control" name="Course_Name" id="Course_Name" onblur="chackreq(this,'cnameerrer')">
              <span id="cnameerrer"></span>
            </div>
            <div class="form-group">
              <label for="">Teacher_name</label>
              <input type="text" class="form-control" name="Teacher_name" id="Teacher_name" onblur="chackreq(this,'tnameerrer')">
              <span id="tnameerrer"></span>
            </div>
            <div class="form-group">
              <label for="">Batch_Time</label>
              <input type="text" class="form-control" name="Batch_Time" id="Batch_Time" onblur="chackreq(this,'timeerrer')">
              <span id="timeerrer"></span>
            </div>
            <div class="form-group">
              <label for="">Teaching_Day</label>
              <input type="text" class="form-control" name="Teaching_Day" id="Teaching_Day" onblur="chackreq(this,'dayerrer')">
              <span id="dayerrer"></span>
            </div>
            <div class="form-group">
              <input type="submit" onclick="savecatagorydata()" class="btn btn-primary form-control" id="save" value="Add course">
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </form>
        </div>
        
        
        
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
    function chackreq(e, spn) {
      if (e.value == "") {
        document.getElementById(spn).innerHTML = "This item is Requerd !!";
      } else {
        document.getElementById(spn).innerHTML = "";

      }
    }
    $(window).on('load', function(e) {
      
      fetchdata()
    })

    function fetchdata(){
      $.ajax({
        url: "showallcourses",
        success: function(response) {
          console.log(response)
          htmltabledata = ""
          a=1
          response.forEach(element => {
            htmltabledata += `<tr>
                <td>${a}</td>
                <td>${element.Course_Name}</td>
                <td>${element.Teacher_name}</td>
                <td>${element.Batch_Time}</td>
                <td>${element.Teaching_Day}</td>
                <td>
                <button onclick="editdata(${element.id} )" class="btn btn-success">Edit</button>
                </td>
                <td>
                <button onclick="deletecourse(${element.id})" class="btn btn-danger">delete</button>
                </td>
                </tr>`
                a++
                
          });
          $("#DispCourse").html(htmltabledata)
        }
      })
    }



    function savecatagorydata() {
        event.preventDefault()
        
        var result = {};
        $.each($('#form').serializeArray(), function() {
            result[this.name] = this.value;
        });

        console.log(result)
       
        $.ajax({
            type: "POST",
            dataType: "json",
            data:result,
            url:"savecourse",
            success:function(response){
                console.log(response);
                if (response == 1) {
                    $('#myModal').modal('hide');
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
        $('#save').val('Edit course');
      $('.modal-title').text('Edit Course');
        
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{id:id,_token:token},
            url:"editcourse",
            success:function(response){
                $('#myModal').modal('show');
                $('#Teaching_Day').val(response.Teaching_Day);
                $('#Batch_Time').val(response.Batch_Time);
                $('#Course_Name').val(response.Course_Name);
                $('#Teacher_name').val(response.Teacher_name);
                $('#save').attr("onclick","updetdata("+response.id+")");
            }
        })

    }
    function updetdata(id){
        event.preventDefault()
        var result = {};
        $.each($('#form').serializeArray(), function() {
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
                    $('#myModal').modal('hide');
                    fetchdata()
                } else {
                    alert("Error while inserting")
                }
            }
        })
    }
    // $('.showEditModal').click(function(e) {
    //   $('#myModal').modal('show');
    //   Teaching_Day = e.target.parentElement.previousElementSibling.innerText
    //   Batch_Time = e.target.parentElement.previousElementSibling.previousElementSibling.innerText
    //   Teacher_name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText
    //   Course_Name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
    //   id = e.target.getAttribute('cid')
    //   console.log(id)

    //   $('#Course_Name').val(Course_Name);
    //   $('#Batch_Time').val(Batch_Time);
    //   $('#Teaching_Day').val(Teaching_Day);
    //   $('#Teacher_name').val(Teacher_name);
    //   $('#submit').val('Edit course');
    //   $('.modal-title').text('Edit Course');
    //   $('#form').attr('action', 'editcourse/' + id);
    //   $('#form').append('<input type="hidden" name="_method" value="POST" >')

    // })

    function deletecourse(id){
       
       $.ajax({
           
           
           
           url:`/deletecourse/${id}`,
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

</body>

</html>