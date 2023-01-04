<?php include "../include/db.php"; ?>
<?php session_start(); ?>

<?php




class exportdata
{

  public function __construct()
  {
    global $connection;

    $username = $_SESSION['username'];
    $query = mysqli_query($connection, "SELECT * FROM posts WHERE post_author='$username'");



    if ($query->num_rows > 0) {
      $delimiter = ",";
      $filename = "members-data_" . date('Y-m-d') . ".csv";

      // Create a file pointer 
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
  }
}

$ex = new exportdata; 



?>