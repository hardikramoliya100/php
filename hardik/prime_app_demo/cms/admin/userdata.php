<?php

class modal
{
    public $dbconnection;
    public function __construct()
    {
        $this->dbconnection = mysqli_connect('localhost', 'root', '', 'cms');
    }

    public function fechdata()
    {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author='$username'";
        $posts_data = mysqli_query($this->dbconnection, $query);
        return $posts_data;
    }
    public function fechcategorydata($post_category_id)
    {
        $query = "SELECT * FROM category WHERE cat_id='{$post_category_id}'";
        $category_edit = mysqli_query($this->dbconnection, $query);
        return $category_edit;
    }

    public function deletepost($post_delete)
    {
        
        $query = "DELETE FROM posts WHERE post_id='{$post_delete}'";
        mysqli_query($this->dbconnection, $query);
    }

    public function resetview($post_reset)
    {
        
        $query = "UPDATE posts SET post_view_count=0 WHERE post_id='{$post_reset}'";
        $delete_data = mysqli_query($this->dbconnection, $query);
    }

    public function exportdata()
    {
        $username = $_SESSION['username'];
        $query = mysqli_query($this->dbconnection,"SELECT * FROM posts WHERE post_author='$username'");
       
      
       
      if($query->num_rows > 0){ 
          $delimiter = ","; 
          $filename = "members-data_" . date('Y-m-d') . ".csv"; 
           
          // Create a file pointer 
          ob_end_clean();
          $f = fopen('php://memory', 'w'); 
           
          // Set column headers 
          $fields = array('ID', 'POST_CATEGORY_ID', 'POST_TITLE', 'POST_AUTHOR', 'POST_DATE', 'POST_IMAGE', 'POST_CONTENT', 'POST_TAGE','POST_COMMENT_COUNT','POST_STATUS','POST_VIEW_COUNT','LIKES'); 
          fputcsv($f, $fields, $delimiter); 
           
          // Output each row of the data, format line as csv and write to file pointer 
          while($row = $query->fetch_assoc()){ 
              $lineData = array($row['post_id'], $row['post_category_id'], $row['post_title'], $row['post_author'], $row['post_date'], $row['post_image'], $row['post_content'], $row['post_tage'], $row['post_comment_count'], $row['post_status'], $row['post_view_count'], $row['likes']); 
              fputcsv($f, $lineData, $delimiter); 
          } 
           
          // Move back to beginning of file 
          fseek($f, 0); 
           
          // Set headers to download file rather than displayed 
          header('Content-Type: text/csv'); 
          header('Content-Disposition: attachment; filename="' . $filename . '";'); 
           
          //output all remaining data on a file pointer 
          fpassthru($f); 
      } 
      exit;
        
    }
}

$obj = new modal;








?>
<?php include "includes/header.php"; ?>

<div id="wrapper">


    <?php include "includes/navigation.php"; ?>





















    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcom Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                    <?php




                    include "includes/view_user_post.php";








                    ?>





                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/footer.php" ?>