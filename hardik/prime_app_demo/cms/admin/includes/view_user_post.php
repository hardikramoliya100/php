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

        <div class="col-lg-1">
            <div class="float-lg-left" style=" float:left; ">
                <select class="form-control" name="select_option" id="select_option">

                    <!-- <option value="">--select option--</option> -->
                    <option value="post_author">author</option>
                    <option value="post_title">title</option>
                </select>
                
            </div>
        </div>
        <div class="col-lg-2">
            
            <input type="text" id="search_name" class="form-control" placeholder="serch">

        </div>
        <div class="col-lg-2">
            
            <button type="button" class="btn btn-primary" onclick="search()">search</button>

        </div>
        <div class="col-lg-7">
            <div class="float-lg-right" style=" float:right; ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Import</button>
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


                $newDate = date("m-d-Y", strtotime($post_date)); 

                echo "<td>$newDate</td>";

                        

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
   
</script>