<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
  <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="formjquery/lib/jquery.js"></script>
  <script src="formjquery/dist/jquery.validate.js"></script>
  <script>
    $.validator.setDefaults({
      submitHandler: function() {
        alert("submitted!");
      }
    });

    $().ready(function() {
      // validate the comment form when it is submitted
      $("#commentForm").validate({
        rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
      });
    })
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Hardik</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="location mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="card">
            <div class="card-header text-center">
              registration
            </div>
            <div class="card-body">
              <form method="post" id="commentForm">
                <div class="row mt-3">
                  <div class="row mr-3">
                    <label for="username">ENTER FIRSTNAME</label>
                  </div>
                  <div class="col">
                    <input type="text" placeholder="Enter firstname" class="form-control mt-1 " name="firstname" id="firstname">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="row mr-3">
                    <label for="username">ENTER LASTNAME</label>
                  </div>
                  <div class="col">
                    <input type="text" placeholder="Enter lastname" class="form-control mt-1 " name="lastname" id="lastname">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="row mr-3">
                    <label for="username">ENTER NAME</label>
                  </div>
                  <div class="col">
                    <input type="text" placeholder="Enter name" class="form-control mt-1 " name="username" id="username">
                  </div>
                </div>
                <hr>
                <div class="row mt-3">
                  <div class="row mr-3">
                    <label for="username">ENTER PASSWORD</label>
                  </div>
                  <div class="col">
                    <input type="password" placeholder="Enter password" class="form-control mt-1 " name="password" id="password">
                  </div>
                </div>
                <hr>
                <div class="row mt-3">
                  <div class="row mr-3">
                    <label for="username">ENTER EMAIL</label>
                  </div>
                  <div class="col">
                    <input type="email" placeholder="Enter email" class="form-control mt-1 " name="email" id="email">
                  </div>
                </div>
                <hr>
                <div class="row mt-3">
                  <div class="row mb-1">
                    <label for="username">PLESS SELECT GENDER</label>
                  </div>
                  <div class="col">
                    <input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
                    <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
                  </div>
                </div>
                <hr>
                <div class="row mt-3">
                  <div class="row mb-1">
                    <label for="username">PLESS SELECT HOBBY</label>
                  </div>
                  <div class="col">
                    <input type="checkbox" name="hobby[]" value="cricket" id="cricket"> <label for="cricket">Cricket</label>
                    <input type="checkbox" name="hobby[]" value="music" id="music"> <label for="music">Music</label>
                    <input type="checkbox" name="hobby[]" value="game" id="game"> <label for="game">Game</label>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col">
                    <select class="form-control text-center" name="city" id="city">
                      <option value="">--select city--</option>
                      <option value="1">AHEMDABAD</option>
                      <option value="2">SURAT</option>
                      <option value="3">RAJKOT</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col text-center">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit">
                    <input type="reset" class="btn btn-danger" name="restet" id="restet">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>