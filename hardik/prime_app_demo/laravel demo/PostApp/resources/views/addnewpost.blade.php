<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <title>Add New Post</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-3">

                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="text-center">ADD NEW POST</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="post_data">
                            <div class="form-group">
                            <input type="hidden" class="form-control" value={{csrf_token()}} name="_token" id="_token">
                                <label for="">Author Name</label>
                                <input type="text" class="form-control" name="author" id="author" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="">Post Category</label>
                                <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="">Post Tage</label>
                                <input type="text" class="form-control" name="tag" id="tag" placeholder="Enter Tage">
                            </div>
                            <div class="form-group">
                                <label for="">Post Discription</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description"> -->
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status" value="published" id="status"> <label for="status"> Published</label>
                                <input type="radio" name="status" value="draft" id="status"> <label for="status"> Draft</label>
                            </div>
                            <div class="row">
                                <div class="col-md-4 offset-5">
                                    <button class="btn btn-primary" onclick="newpost()">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function newpost() {
            event.preventDefault();
            var result = {};
            $.each($('#post_data').serializeArray(), function() {
                result[this.name] = this.value;
            });
            console.log(result);

            $.ajax({
                type:'POST',
                dataType:'json',
                data:result,
                url:'savenewpost',
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        window.location.href = "post"
                    } else {
                        alert("something Worng !!!")
                    }
                }
            })
        }
    </script>


</body>

</html>