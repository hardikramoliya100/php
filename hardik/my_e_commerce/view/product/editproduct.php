<div class="jumbotron text-center">
    <h1 class="">EDIT PRODUCT</h1>
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
                                <input type="hidden" name="id" id="id">
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
                                <input type="file" class="" name="profile_pic" id="profile_pic">
                            </div>
                        </div>

                        <div class="row mt-3 ">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" onclick="editdata()" name="edit" id="edit">

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
                    htmldata += `<input type="checkbox" name="product_cetagory[]" class="cet" value="${element.id}" id="${element.id}"> <label for="${element.cetagory}"> ${element.cetagory}</label>`

                });
                $('#cetagorydata').html(htmldata)
            }
        })
    }

    $(window).on('load', function(e) {

        update()
    })

    function update() {
        var id = <?php echo $id; ?>;

        $.ajax({
            type: "POST",
            data: {
                id: id
            },
            url: "fetcheditproductdata",
            success: function(response) {
                data = JSON.parse(response)
                // console.log(data);
                $('#id').val(data.id);
                $('#Product').val(data.Product);
                $('#product_discription').val(data.product_discription);
                $('#Price').val(data.Price);
                $('#quantity').val(data.quantity);
                if (data.rtype == "Return") {
                    $('input:radio[class=type][id=return]').prop('checked', true);
                } else {
                    
                    $('input:radio[class=type][id=nonreturn]').prop('checked', true);
                }
                var crtagorydata = data.product_cetagory;
                var numbersArray = crtagorydata.split(',');
                $.each(numbersArray, function(i, val) {

                    $("input[value='" + val + "']").prop('checked', true);

                });
                
            }
        })
    }
    function editdata(){
        event.preventDefault();
        cetagory=[];
        $(".cet").each(function(e){
            if($(this).is(":checked")){
                cetagory.push($(this).val());
            }
        });
        cetagory = cetagory.toString();
        // console.log(cetagory);
        var type = $(".type:checked").val();
        var data ={
            id:$('#id').val(),
            Product:$('#Product').val(),
            product_discription:$('#product_discription').val(),
            Price:$('#Price').val(),
            quantity:$('#quantity').val(),
            type:type,  
            product_cetagory:cetagory,
            profile_pic:$('#profile_pic').val(),
            
        };

        console.log(data);
        $.ajax({
        type:"POST",
        data:data,
        url:"editdataproduct",
        success:function(response){
            data = JSON.parse(response)
            console.log(data);
            

                if(data==2){
                    window.location.href="product"
                }
            
        }


    });
    }

</script>