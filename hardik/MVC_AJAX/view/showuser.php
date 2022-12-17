<div class="container">
    <table class="table table-bordered">
        <thead class="bg-dark text-light">
            <tr>
                <td>id</td>
                <td>firstname</td>
                <td>lastname</td>
                <td>email</td>
                <td>mobile</td>
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

    function fectchdata(){
        $.ajax({
            url:"showalluserdata",
            success:function(response){
                data=JSON.parse(response)
                console.log(data);   
                htmldata = "";
                a=1;
                data.forEach(element => {
                    htmldata += `<tr>
                    <td>${a++}</td>
                    <td>${element.firstname}</td>
                    <td>${element.lastname}</td>
                    <td>${element.email}</td>
                    <td>${element.mobile}</td>
                    <td>${element.id}</td>
                    </tr>
                    `
                    
                });
                $('#formdata').html(htmldata)
            }
        })
    }
</script>