<div class="jumbotron text-center">
    <h1 class="">ADD PRODUCT</h1>
    <div class="float-right mr-5">
        <a href="product" class="btn btn-primary">all product</a>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    ADD NEW PRODUCT
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="form">

                        <div class="row">
                            <div class="col">
                                <label for="">Product Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Enter Product name " class="form-control" name="Product" id="Product">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Product Discription</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <textarea class="form-control" placeholder="Enter Discription" name="product_discription" id="product_discription" cols="50" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Product Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="tel" placeholder="Enter Price" class="form-control" name="Price" id="Price">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Product Quantity</label>
                            </div>
                        </div>
                        <div class="row">
                            <select name="quantity" class="form-control" id="quantity">
                                <option value="">---Select Quantity---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="radio" name="type" class="type" value="Return" id="return"> <label for="return"> Return</label>
                                <input type="radio" name="type" class="type" value="Nonreturn" id="nonreturn"> <label for="nonreturn"> Nonreturn</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col" id="cetagorydata">
                                <!-- <input type="checkbox" name="hobbies[]" value="cricket" id="cricket"> <label for="cricket"> cricket</label>
                                <input type="checkbox" name="hobbies[]" value="music" id="music"> <label for="music"> music</label>
                                <input type="checkbox" name="hobbies[]" value="gaming" id="gaming"> <label for="music"> gaming</label> -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Product Image</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="button" value="Upload Image" name="upload_file" id="upload_file" onclick="image_upload(this.form);">
                            </div>
                        </div>

                        <div class="row mt-3 ">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" onclick="savedata()" name="save" id="save">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        fectchcetagory();
    });

    function fectchcetagory() {
        $.ajax({
            url: "showallcetagory",
            success: function(response) {
                data = JSON.parse(response)
                // console.log(data);
                htmldata = "";

                data.forEach(element => {
                    // console.log(element);
                    htmldata += `<input type="checkbox" name="product_cetagory[]" class="cet" value="${element.id}" id="${element.cetagory}"> <label for="${element.cetagory}"> ${element.cetagory}</label>`

                });
                $('#cetagorydata').html(htmldata)
            }
        })
    }

    function savedata() {
        event.preventDefault();
        cetagory = [];
        $(".cet").each(function(e) {
            if ($(this).is(":checked")) {
                cetagory.push($(this).val());
            }
        });
        cetagory = cetagory.toString();
        // console.log(cetagory);
        var type = $(".type:checked").val();
        var data = {
            Product: $('#Product').val(),
            product_discription: $('#product_discription').val(),
            Price: $('#Price').val(),
            quantity: $('#quantity').val(),
            type: type,
            product_cetagory: cetagory,
            profile_pic: $('#profile_pic').val(),

        };

        $.ajax({
            url: "newproductdata",
            type: "POST",
            data: data,
            success: function(response) {
                data = JSON.parse(response)
                console.log(data);


                if (data == 2) {
                    window.location.href = "product"
                } else {
                    alert("Error")
                }

            }


        });
    }

    function image_upload(form) {
        console.log(form);
        jQuery.ajax({

            type: 'POST',
            url: 'uploadimg',
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                ///alert(result);  

            }
        });
    }
</script>