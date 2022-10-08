<div id="page-wrapper">
    <div class="main-page">
        <div class="col_3">
            <div class="clearfix"> </div>
        </div>

        <div class="charts">
            <div class="mid-content-top charts-grids">
                <div class="middle-content">
                    <section class="locations-1" id="locations">
                        <style>
                            input[type="radio"],
                            input[type="checkbox"] {
                                -webkit-appearance: auto !important;
                                outline: auto !important;
                            }
                        </style>
                        <div class="locations py-5">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-4">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                ADD NEW USER
                                            </div>
                                            <div class="card-body">
                                                <form method="post" enctype="multipart/form-data">

                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" placeholder="Enter User Name " class="form-control" name="username" id="username">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <input type="text" placeholder="Enter full Name" class="form-control" name="fullname" id="fullname">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <input type="email" placeholder="Enter Email Id" class="form-control" name="email" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <input type="tel" placeholder="Enter Mobil Number" class="form-control" name="mobile" id="mobile">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <input type="number" placeholder="Enter Role Id" class="form-control" name="Roleid" id="Roleid">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <select name="city" class="form-control" id="city">
                                                            <option value="">---Select City---</option>
                                                            
                                                            <?php
                                                            foreach ($AllCitiesData['data'] as $citieskey => $citiesvalue) { ?>
                                                                <option value="<?php echo $citiesvalue->name; ?>"><?php echo $citiesvalue->name; ?></option>
                                                                
                                                            <?php }; ?>
                                                            <!-- <option value="1">Ahemdabad</option>
                                                            <option value="2">Baroda</option>
                                                            <option value="3">Surat</option> -->
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
                                                            <input type="password" placeholder="Enter password" class="form-control" name="password" id="password">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row mt-3">
                                    <div class="col">
                                        <input type="file"  class="" name="profile_pic" id="profile_pic">
                                    </div>
                                </div> -->

                                                    <div class="row mt-3 ">
                                                        <div class="col text-center">
                                                            <input type="submit" class="btn btn-primary" name="registration" id="registration">
                                                            
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
                </div>
            </div>
        </div>
    </div>
</div>