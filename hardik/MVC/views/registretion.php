<section class="locations-1" id="locations">
    <style>
        input[type="radio"]{
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
                                        <input type="text" placeholder="Enter User Name or Email" class="form-control" name="username" id="username">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" placeholder="Enter Email Id"  class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="tel" placeholder="Enter Mobil Number"  class="form-control" name="mobile" id="mobile">
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
                                        <input type="password" placeholder="Enter password"  class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <!-- <div class="row mt-3">
                                    <div class="col">
                                        <input type="file"  class="" name="profile_pic" id="profile_pic">
                                    </div>
                                </div> -->
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