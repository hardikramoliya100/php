<div class="jumbotron text-center">
    <h1 class="">ALL PRODUCT</h1>
    <div class="float-right mr-5">
        <a href="addproduct" class="btn btn-primary">Add product</a>
    </div>
    <div class="float-right mr-5">
        <a href="cetagory" class="btn btn-primary">All Cetagory</a>
    </div>
    
</div>
<div class="container">
    <table class="table table-bordered">
        <thead class="bg-dark text-light">
            <tr>
                <td>id</td>
                <td>Product</td>
                <td>product_discription</td>
                <td>Price</td>
                <td>quantity</td>
                <td>type</td>
                <td>product_cetagory</td>
                <td>profile_pic</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody id="formdata">

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        fectchdata();
    });

    function fectchdata() {
        $.ajax({
            url: "fetchallproduct",
            success: function(response) {
                data = JSON.parse(response)
                console.log(data);
                htmldata = "";
                a = 1;
                data.forEach(element => {
                    htmldata += `<tr>
                    <td>${a++}</td>
                    <td>${element.Product}</td>
                    <td>${element.product_discription}</td>
                    <td>${element.Price}</td>
                    <td>${element.quantity}</td>
                    <td>${element.rtype}</td>
                    <td>${element.product_cetagory}</td>
                    <td>${element.id}</td>
                    <td>
                    
                    <a class="btn btn-sm btn-primary" href="productedit?id=${element.id}">Edit</a>
                    <button onclick="deletecetagory(${element.id})" class="btn btn-danger">delete</button>
                    </td>
                    
                    
                    </tr>
                    `

                });
                $('#formdata').html(htmldata)
            }
        })
    }

    function deletecetagory(id) {

$.ajax({


    type: "post",
    data: {
        id: id
    },
    url: "deleteprouduct",
    success: function(response) {
        console.log(response);
        data = JSON.parse(response)
        if (data == 2) {

            fetchdata();
        } else {
            alert("Error while inserting")
        }
    }
})
}
</script>



