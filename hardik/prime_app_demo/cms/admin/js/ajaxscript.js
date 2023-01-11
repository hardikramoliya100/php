function search() {

    // console.log("helle");
    let search_value = document.getElementById("select_option").value;
    let search_name = document.getElementById("search_name").value;



    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(event) {



        myobj = JSON.parse(this.responseText);

        console.log(myobj);
        if (myobj == 0) {
            // alert("NO DATA");
            let tabledata = "<h1>NO DATA FOUND</h1>";
            document.getElementById("table").style.textAlign = "center" ;
            document.getElementById("table").innerHTML = tabledata;
            
        } else {



            let tabledata = "";

            for (let x in myobj) {

                let someDate = new Date(myobj[x].post_date).toLocaleString('in', {
                    month: 'numeric',
                    day: 'numeric',
                    year: 'numeric',
                  });;
                tabledata += `<tr>

            <td>${myobj[x].post_id}</td>
            <td>${myobj[x].post_author}</td>
            <td>${myobj[x].post_title}</td>
            <td>${myobj[x].cat_title}</td>
            <td>${myobj[x].post_status}</td>
            <td><img width='100' src='../images/${myobj[x].post_image}' alt=''></td>
            <td>${myobj[x].post_tage}</td>
            <td>${myobj[x].post_comment_count}</td>
            
            <td>${someDate}</td>
            <td><a class='btn btn-success btn-sm' href='../post.php?p_id=${myobj[x].post_id}'>VIEW</a></td>
            <td><a class='btn btn-warning btn-sm' href='posts.php?sourse=edit_post&p_id=${myobj[x].post_id}'>EDIT</a></td>
            <td><a rel='${myobj[x].post_id}' class='btn btn-danger btn-sm delete_link' href='javascript:void(0)'>DELETE</a></td>
            <td>${myobj[x].post_view_count}</td>

            </tr> `
            }

            document.getElementById("tdata").innerHTML = tabledata;
        }
    }



    xhttp.open("GET", "http://localhost/php/hardik/prime_app_demo/cms/admin/includes/feachdata.php?value=" + search_value + "&name=" + search_name, true);
    xhttp.send();
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // xhttp.send("value=Henry&name=Ford");
    // xhttp.open("POST", "demo_post2.asp", true);
}

function exportdata() {


    let search_value = document.getElementById("select_option").value;

    let search_name = document.getElementById("search_name").value;
    if (search_name === "") {

        search_name = 0
    }

    document.location.href = "http://localhost/php/hardik/prime_app_demo/cms/admin/includes/feachexportdata.php?value=" + search_value + "&name=" + search_name;



}


$(document).ready(function() {
    $('.delete_link').on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "userdata.php?delete=" + id + "";
        $(".model_delete_link").attr("href", delete_url);
        $("#exampleModal").modal('show');
    });
});

function formToggle(ID) {
    var element = document.getElementById(ID);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}