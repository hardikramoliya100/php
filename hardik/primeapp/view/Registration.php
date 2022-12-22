<div class="jumbotron text-center">
    <h1 class="">REGISTRATION</h1>

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    REGISTRATION
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="form">

                        <div class="row">
                            <div class="col">
                                <label for="">User Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Enter Username " class="form-control" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">First Name</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <input type="text" placeholder="Enter Firstname " class="form-control" name="firstname" id="firstname" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Last Name</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <input type="text" placeholder="Enter Lastname " class="form-control" name="lastname" id="lastname" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Email</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <input type="text" onblur="chackreq(this,'emailerrer')" placeholder="Enter email " class="form-control" name="email" id="email" required>
                                <span id="emailerrer"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Password</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <input type="text" placeholder="Enter Password " class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Date-Of-Birth</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <input type="date" placeholder="Enter Password " class="form-control" name="date" id="date" required>
                            </div>
                        </div>




                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Image</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <input type="file" name="profile_pic" id="profile_pic">

                            </div>
                        </div>

                        <div class="row mt-3 ">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" name="save" id="save">

                            </div>
                        </div>
                    </form>
                    <a href="login">Login</a>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.getElementById('email').addEventListener("keyup", function() {

        var RegX = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        if (RegX.test(this.value)) {
            document.getElementById("emailerrer").innerHTML = "";


        } else {
            document.getElementById("emailerrer").innerHTML = "invalid item";

        }

    })
</script>