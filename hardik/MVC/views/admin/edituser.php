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
                                                EDIT USER
                                            </div>
                                            <?php
                                            // echo "<pre>";
                                            // print_r($EditUserData);
                                            ?>
                                            <div class="card-body">
                                                
                                                <?php
                                                foreach ($EditUserData['data'] as $key => $value) {
                                                ?>
                                                    <form method="post" enctype="multipart/form-data">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="username">User Name</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" value="<?php echo $value->username; ?>" class="form-control" name="username" id="username">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <label for="fullname">Full Name</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" value="<?php echo $value->fullname; ?>" class="form-control" name="fullname" id="fullname">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <label for="email">Email</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="email" value="<?php echo $value->email; ?>" class="form-control" name="email" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <label for="mobile">Mobile</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" value="<?php echo $value->mobile; ?>" class="form-control" name="mobile" id="mobile">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row mt-3">
                                                            <div class="col">
                                                                <input type="number" placeholder="Enter Role Id" class="form-control" name="Roleid" id="Roleid">
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="row mt-3">
                                                            <select name="city" class="form-control" id="city">
                                                                <option value="">---Select City---</option>
                                                                <option value="1">Ahemdabad</option>
                                                                <option value="2">Baroda</option>
                                                                <option value="3">Surat</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <label for="gender">Gender</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="radio" <?php if ($value->gender == "Male") {
                                                                                        echo "checked";
                                                                                    }  ?> name="gender" value="Male" id="male"> <label for="male"> Male</label>
                                                                <input type="radio" <?php if ($value->gender == "Female") {
                                                                                        echo "checked";
                                                                                    }  ?> name="gender" value="Female" id="female"> <label for="female"> Female</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mt-3">
                                                                <input type="checkbox" <?php $arr = explode(",", $value->hobby);
                                                                                        if (in_array("cricket", $arr)) {
                                                                                            echo "checked";
                                                                                        }  ?> name="hobbies[]" value="cricket" id="cricket"> <label for="cricket"> cricket</label>
                                                                <input type="checkbox" <?php $arr = explode(",", $value->hobby);
                                                                                        if (in_array("music", $arr)) {
                                                                                            echo "checked";
                                                                                        }  ?> name="hobbies[]" value="music" id="music"> <label for="music"> music</label>
                                                                <input type="checkbox" <?php $arr = explode(",", $value->hobby);
                                                                                        if (in_array("gaming", $arr)) {
                                                                                            echo "checked";
                                                                                        }  ?> name="hobbies[]" value="gaming" id="gaming"> <label for="gaming"> gaming</label>

                                                            </div>
                                                        </div>

                                            </div>
                                            <div class="row ">
                                                <div class="col-md-2 mt-3">
                                                    <label for="country">country</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="country"  id="country" class="form-control" onchange="getstateid(this)">
                                                    <option value="">Select Contry</option>
                                                     <?php
                                                     foreach ($AllCountryData['data'] as $countrykey => $countryvalue) { ?>
                                                        <option <?php if ($value->country_id == $countryvalue->id) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $countryvalue->id; ?>"><?php echo $countryvalue->name; ?></option>
                                                     <?php } ?>
                                                    </select>
                                                    <script>
                                                        function getstateid(e){
                                                            // console.log(e);
                                                            // console.log(e.value);
                                                            
                                                            $.ajax({
                                                                url:"getstateid",
                                                                method:"post",
                                                                data:{"contryid":e.value},
                                                                success:function(state){
                                                                data = JSON.parse(state)
                                                                // console.log(data.data);
                                                                htmloption = "<option>Select state</option>"
                                                                data.data.forEach(element => {
                                                                    // console.log(element);
                                                                    htmloption += '<option value='+element.id+'>'+element.name +"</option>"
                                                                });
                                                                // console.log(htmloption);
                                                                $("#state").html(htmloption);
                                                                
                                                                }
                                                            })
                                                        }
                                                        function getscityid(e){ 
                                                            // console.log(e.value);
                                                            
                                                            $.ajax({
                                                                url:"getcityid",
                                                                method:"post",
                                                                data:{"stateid":e.value},
                                                                success:function(city){
                                                                data = JSON.parse(city)
                                                                // console.log(data.data);
                                                                htmloption = "<option>Select city</option>"
                                                                data.data.forEach(element => {
                                                                    // console.log(element);
                                                                    htmloption += '<option value='+element.id+'>'+element.name +"</option>"
                                                                });
                                                                // console.log(htmloption);
                                                                $("#city").html(htmloption);
                                                                
                                                                }
                                                            })
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="state">State</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="state" id="state" class="form-control" onchange="getscityid(this)">
                                                        <option value="">Select State</option>
                                                        <?php
                                                     foreach ($AllStatesData['data'] as $Stateskey => $Statesvalue) { ?>
                                                        <option <?php if ($value->state_id == $Statesvalue->id) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $Statesvalue->id; ?>"><?php echo $Statesvalue->name; ?></option>
                                                     <?php } ?>
                                                       
                                                    </select>
                                                    <script>
                                                        // $.ajax({
                                                        //     url:"http://localhost/php/hardik/MVC/allstate",
                                                        //     success:function(state){
                                                        //         data = JSON.parse(state)
                                                        //         // console.log(data.data);
                                                        //         htmloption = "<option>Select state</option>"
                                                        //         data.data.forEach(element => {
                                                        //             // console.log(element);
                                                        //             htmloption += "<option>"+element.name +"</option>"
                                                        //         });
                                                        //         // console.log(htmloption);
                                                        //         $("#state").html(htmloption);
                                                        //     }
                                                        // })
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="city">city</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">Select City</option>
                                                        <?php
                                                     foreach ($AllCitiesData['data'] as $citykey => $cityvalue) { ?>
                                                        <option <?php if ($value->city == $cityvalue->id) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $cityvalue->id; ?>"><?php echo $cityvalue->name; ?></option>
                                                     <?php } ?>
                                                       

                                                    </select>
                                                    <script>
                                                        // $.ajax({
                                                        //     url:"http://localhost/php/hardik/MVC/allcity",
                                                        //     success:function(city){
                                                        //         data = JSON.parse(city)
                                                        //         htmloption = "<option>select city</option>"

                                                        //         data.data.forEach(element => {
                                                        //             htmloption += "<option>"+element.name+"</option>"
                                                                    
                                                        //         });
                                                        //         // console.log(htmloption);
                                                        //         $("#city").html(htmloption);
                                                        //     }
                                                        // })
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label for="profile_pic">Profile Pic</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo $value->profile_pic;?>" name="old_profile_pic" id="old_profile_pic">
                                                    <input type="file" class="" name="profile_pic" id="profile_pic">
                                                </div>
                                            </div>

                                            <div class="row mt-3 ">
                                                <div class="col text-center">
                                                    <input type="submit" class="btn btn-primary" name="edit" id="edit" value="EDIT">

                                                </div>
                                            </div>
                                            </form>
                                        <?php
                                                } ?>
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