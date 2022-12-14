<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="jumbotron text-center">
        <h1 class="">Ajax data</h1>
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal">Add Data</button>
    </div>
    <div class="container-fluid" id="hardik">
        
    </div>
    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label>first name</label>
                            <input type="text" name="" id="firstname" placeholder="first name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>last name</label>
                            <input type="text" name="" id="lastname" placeholder="last name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="" id="email" placeholder="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>mobile</label>
                            <input type="text" name="" id="mobile" placeholder="mobile" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addrecord()" class="btn btn-danger" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            fechdata();
        });

        function fechdata() {
            var fechdata = "fechdata";
            $.ajax({
                url: "backend.php",
                type: "post",
                data: {
                    fechdata: fechdata
                },
                success: function(data) {
                    console.log(data)
                    $('#hardik').html(data);
                }


            });
        }

        function addrecord() {
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();

            $.ajax({
                url: "backend.php",
                type: "post",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    mobile: mobile
                },
                success: function(response) {
                    fechdata();
                }
            });
        }
    </script>
</body>

</html>