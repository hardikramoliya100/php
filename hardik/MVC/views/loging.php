
<section class="locations-1" id="locations">
    <div class="locations py-5">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Loging
                        </div>
                        <div class="card-body">
                            <form method="post">

                            
                            <div class="row">
                                <div class="col">
                                    <input type="text" onblur="checkreq(this,'usernameerrer')" placeholder="Enter User Name or Email" class="form-control" name="username" id="username">
                                    <span id="usernameerrer"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" onblur="checkreq(this,'passworderrer')" placeholder="Enter password"  class="form-control" name="password" id="password">
                                    <span id="passworderrer"></span>
                                </div>
                            </div>
                            <div class="row mt-3 ">
                                <div class="col text-center">
                                    <input type="submit"  class="btn btn-primary" name="login" id="login" value="Login">
                                    <input type="reset"  class="btn btn-danger" name="reset" id="reset">
                                </div>
                            </div>
                            <div class="row mt-3 ">
                                <div class="col text-center">
                                   <a href="registretion">Click here for new account</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    document.getElementById('username').addEventListener("keyup",function(){

        var RegX = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        if (RegX.test(this.value)) {
            console.log("inside if");
            document.getElementById("usernameerrer").innerHTML = ""
            
            
        } else {
            console.log("inside else");
            document.getElementById("usernameerrer").innerHTML = "Invalid formate"
            
        }
    })
   

    function checkreq(e,spn){
        // uname = document.getElementById(e)
        // console.log(e.value);
        if (e.value == "") {
            document.getElementById(spn).innerHTML = "This fild is requerd !!"
            // console.log("this fild is requerd !!");
        } else {
            
            console.log("Done");
        }

    }
</script>