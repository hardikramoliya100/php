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
        $query = mysqli_query($this->dbconnection, "SELECT * FROM posts WHERE post_author='$username'");



        if ($query->num_rows > 0) {
            $delimiter = ",";
            $filename = "members-data_" . date('Y-m-d') . ".csv";

            // Create a file pointer 
            ob_end_clean();
            $f = fopen('php://memory', 'w');

            // Set column headers 
            $fields = array('ID', 'POST_CATEGORY_ID', 'POST_TITLE', 'POST_AUTHOR', 'POST_DATE', 'POST_IMAGE', 'POST_CONTENT', 'POST_TAGE', 'POST_COMMENT_COUNT', 'POST_STATUS', 'POST_VIEW_COUNT', 'LIKES');
            fputcsv($f, $fields, $delimiter);

            // Output each row of the data, format line as csv and write to file pointer 
            while ($row = $query->fetch_assoc()) {
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
    public function importdata()
    {

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

            // If the file is uploaded
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                // Skip the first line
                fgetcsv($csvFile);

                // Parse data from CSV file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    // Get row data
                    $post_category_id   = $line[0];
                    $post_title  = $line[1];
                    $post_author  = $line[2];
                    $post_date = $line[3];
                    $post_image = $line[4];
                    $post_content = $line[5];
                    $post_tage = $line[6];
                    $post_comment_count = $line[7];
                    $post_status = $line[8];
                    $post_view_count = $line[9];
                    $likes = $line[10];

                
                    // $link = "http://images5.fanpop.com/image/photos/31100000/random-random-31108109-500-502.jpg";
                    // $destdir = '../images/';
                    // $img = file_get_contents($post_image);
                    // file_put_contents('/php/hardik/prime_app_demo/cms/images/car1.txt ', "img");
                    // exit;
             
                    
                    $split_image = pathinfo($post_image);
                    
                    $ch = curl_init($post_image);
                    $save= '../images/';
                    $file_name = basename($post_image);
                    $final_save =$save.$file_name;
                    $file = fopen($final_save, 'w');
                    
                    curl_setopt($ch, CURLOPT_FILE, $file);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_exec($ch);
                    curl_close($ch);
                    fclose($file);
                    // exit;
                    // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    // $response = curl_exec($ch);
                    // curl_close($ch);
                    // fwrite($file, $response);
                    
                    // $split_image = pathinfo($post_image);
                    
                    // $target_Path = "images/";
                    // $target_Path = $target_Path . $split_image['basename'];
                    // print_r($target_Path);
                    // move_uploaded_file($_FILES['userFile']['tmp_name'], $target_Path);



                    mysqli_query($this->dbconnection, "INSERT INTO posts VALUES ('','$post_category_id','$post_title','$post_author',now(),'$file_name','$post_content','$post_tage','$post_comment_count','$post_status','$post_view_count','$likes')");
                }

                // Close opened CSV file
                fclose($csvFile);

                $qstring = '?status=succ';
            } else {
                $qstring = '?status=err';
            }
        } else {
            $qstring = '?status=invalid_file';
        }

        header("Location: userdata.php" . $qstring);
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