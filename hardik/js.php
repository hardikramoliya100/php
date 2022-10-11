<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
  <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
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

  <div class="locations py-5">

    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="card">
            <div class="card-header text-center">
              registretion
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col">
                    <input type="text" onblur="chackreq(this,'usrenameerrer')" placeholder="Enter User Name " class="form-control" name="username" id="username">
                    <span id="usrenameerrer"></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" onblur="chackreq(this,'fullnameerrer')" placeholder="Enter full Name" class="form-control" name="fullname" id="fullname">
                    <span id="fullnameerrer"></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="email" onblur="chackreq(this,'emailerrer')" placeholder="Enter Email Id" class="form-control" name="email" id="email">
                    <span id="emailerrer"></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="tel" onblur="chackreq(this,'mobileerrer')" placeholder="Enter Mobil Number" class="form-control" name="mobile" id="mobile">
                    <span id="mobileerrer"></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <select name="city" class="form-control" id="city">
                      <option value="">---Select City---</option>
                      <option value="1">Ahemdabad</option>
                      <option value="2">Baroda</option>
                      <option value="3">Surat</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="radio" name="gender" value="Male" id="male"> <label for="male"> Male</label>
                    <input type="radio" name="gender" value="Female" id="female"> <label for="female"> Female</label>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="checkbox" name="hobbies[]" value="cricket" id="cricket"> <label for="cricket"> cricket</label>
                    <input type="checkbox" name="hobbies[]" value="music" id="music"> <label for="music"> music</label>
                    <input type="checkbox" name="hobbies[]" value="gaming" id="gaming"> <label for="music"> gaming</label>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="password" onblur="chackreq(this,'passworderrer')" placeholder="Enter password" class="form-control" name="password" id="password">
                    <span id="passworderrer"></span>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="file" class="" name="profile_pic" id="profile_pic">
                  </div>
                </div>

                <div class="row mt-3 ">
                  <div class="col text-center">
                    <input type="submit" class="btn btn-primary" name="registration" id="registration">
                    <input type="reset" class="btn btn-danger">
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
<script>
  document.getElementById('email').addEventListener("keyup",function(){

    var RegX = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
    if (RegX.test(this.value)) {
      document.getElementById("emailerrer").innerHTML = "";
      
      
    } else {
      document.getElementById("emailerrer").innerHTML = "invalid item";
      
    }

  })

  document.getElementById('mobile').addEventListener("keyup",function(){

    var MobileX = /^[0-9]{10}$/
    if (MobileX.test(this.value)) {
      document.getElementById("mobileerrer").innerHTML = "";
      
      
    } else {
      document.getElementById("mobileerrer").innerHTML = "invalid item";
      
    }

  })

  function chackreq(e, spn) {
    if (e.value == "") {
      document.getElementById(spn).innerHTML = "This item is Requerd !!";

    } else {
      document.getElementById(spn).innerHTML = "";

    }

  }
</script>