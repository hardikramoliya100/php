<?php include("delete_model.php"); ?>
<?php include("ModalClassForUser.php"); ?>
<?php
$obj = new modal;
if (isset($_POST['export'])) {

    $obj->exportdata();
}

if (isset($_POST['importSubmit'])) {
    $obj->importdata();
}

if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<?php if (!empty($statusMsg)) { ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>


<form action="" method="post">

    <table class="table table-bordered table-hover " id="table">

        <div class="col-xs-8">
            <div class="float-lg-left" style=" float:left; ">
                <select class="form-control" name="select_option" id="select_option">

                    <!-- <option value="">--select option--</option> -->
                    <option value="post_author">author</option>
                    <option value="post_title">title</option>
                </select>
                <input type="text" id="search_name" class="form-control" placeholder="serch">
                <button type="button" class="btn btn-primary" onclick="search()">search</button>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="float-lg-right" style=" float:right; ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Import</button>
                <!-- <form action="userdata.php" method="post"><input class="btn btn-primary" type="submit" value="Export" name="export"></form> -->
                <button type="button" class="btn btn-primary" onclick="exportdata()">Export</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="userdata.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="file" name="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tage</th>
                <th>Comment</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody id="tdata">
            <?php

            if (isset($_GET['delete'])) {
                $post_delete = $_GET['delete'];
                $obj->deletepost($post_delete);

                header("location:userdata.php");
            }

            if (isset($_GET['reset'])) {
                $post_reset = $_GET['reset'];
                $obj->resetview($post_reset);

                header("location:userdata.php");
            }

            ?>

            <?php
            $posts_data = $obj->fechdata();

            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tage = $row['post_tage'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
                $post_view_count = $row['post_view_count'];

                echo "<tr>";
            ?>

            <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                $category_edit = $obj->fechcategorydata($post_category_id);

                while ($row = mysqli_fetch_assoc($category_edit)) {
                    $cat_title = $row['cat_title'];

                    echo "<td>$cat_title</td>";
                }

                echo "<td>$post_status</td>";
                echo "<td><img width='100' src='../images/$post_image' alt=''></td>";
                echo "<td>$post_tage</td>";
                echo "<td><a href='post_comment.php?p_id=$post_id'>$post_comment_count</a></td>";
                echo "<td>$post_date</td>";
                echo "<td><a class='btn btn-success btn-sm' href='../post.php?p_id={$post_id}'>VIEW</a></td>";
                echo "<td><a class='btn btn-warning btn-sm' href='posts.php?sourse=edit_post&p_id=$post_id'>EDIT</a></td>";
                echo "<td><a rel='$post_id' class='btn btn-danger btn-sm delete_link' href='javascript:void(0)'>DELETE</a></td>";
                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to reset'); \" href='userdata.php?reset=$post_id'>$post_view_count</a></td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>
</form>

<script>
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
                    tabledata += `<tr>

                <td>${myobj[x].post_id}</td>
                <td>${myobj[x].post_author}</td>
                <td>${myobj[x].post_title}</td>
                <td>${myobj[x].cat_title}</td>
                <td>${myobj[x].post_status}</td>
                <td><img width='100' src='../images/${myobj[x].post_image}' alt=''></td>
                <td>${myobj[x].post_tage}</td>
                <td>${myobj[x].post_comment_count}</td>
                <td>${myobj[x].post_date}</td>
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
        // console.log(search_name);

        // const edata = new XMLHttpRequest();

        // edata.onload = function(event){
        //     mydata = JSON.parse(this.responseText);
        //     console.log(mydata); 
        // }

        // edata.open("GET","http://localhost/php/hardik/prime_app_demo/cms/admin/includes/feachexportdata.php?value="+search_value+"&name="+search_name,true);
        // edata.send();

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
</script>