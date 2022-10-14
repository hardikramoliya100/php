<section class="locations-1" id="locations">
    <style>
        input[type="radio"],input[type="checkbox"]{
            -webkit-appearance: auto !important ;
            outline: auto !important;
        }
    </style>
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
                                        <input type="text" onblur="chackreq(this,'usernameerrer')" placeholder="Enter User Name " class="form-control" name="username" id="username">
                                        <span id="usernameerrer"></span>
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
                                        <input type="email" onblur="chackreq(this,'emailerrer')" placeholder="Enter Email Id"  class="form-control" name="email" id="email">
                                        <span id="emailerrer"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="tel" onblur="chackreq(this,'mobileerrer')" placeholder="Enter Mobil Number"  class="form-control" name="mobile" id="mobile">
                                        <span id="mobileerrer"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <select name="city" class="form-control" id="city">
                                        <option value="">---Select City---</option>
                                        <option value="1">Ahemdabad</option>
                                        <option value="2">Baroda</option>
                                        <option value="3">Surat</option>
                                    </select>
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
                                        <input type="password" onblur="chackreq(this,'passworderrer')" placeholder="Enter password"  class="form-control" name="password" id="password">
                                        <span id="passworderrer"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="file"  class="" name="profile_pic" id="profile_pic">
                                    </div>
                                </div>
                                
                                <div class="row mt-3 ">
                                    <div class="col text-center">
                                        <input type="submit"  class="btn btn-primary" name="registration" id="registration">
                                        <input type="reset"  class="btn btn-danger" >
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
    function chackreq(e,spn){

        if (e.value != "") {
            document.getElementById(spn).innerHTML = "";
        } else {
            document.getElementById(spn).innerHTML = "This item is Requerd !!";
        }
        
    }
</script>