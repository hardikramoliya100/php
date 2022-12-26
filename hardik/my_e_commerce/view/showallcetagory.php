<div class="jumbotron text-center">
    <h1 class="">ALL CETAGORY</h1>
    <div class="float-right mr-5">
        <a href="addcetagory" class="btn btn-primary">Add Cetagory</a>
        <a href="product" class="btn btn-primary">All Prouct</a>
    </div>  
</div>
<div class="container">
    <table class="table table-bordered">
        <thead class="bg-dark text-light">
            <tr>
                <td>id</td>
                <td>category</td>

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
            url: "showallcetagory",
            success: function(response) {
                data = JSON.parse(response)
                console.log(data);
                htmldata = "";
                a = 1;
                data.forEach(element => {
                    htmldata += `<tr>
                    <td>${a++}</td>
                    <td>${element.cetagory}</td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="editcetagory?id=${element.id}">Edit</a>
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
            url: "deletecourse",
            success: function(response) {
                data = JSON.parse(response)
                // console.log(data);
                if (data == 2) {
                    fectchdata();
                } else {
                    alert("Error")
                }
            }
        })
    }

    
</script>