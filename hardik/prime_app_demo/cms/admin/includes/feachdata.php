<?php


$dbconnection = mysqli_connect('localhost', 'root', '', 'cms');


$name = $_GET['name'];
$value = $_GET['value'];

// echo $name;
// echo $value;
//     echo "hellow";

    $query = "SELECT * FROM posts JOIN category ON posts.post_category_id=category.cat_id WHERE $value='$name' ";

    $data = mysqli_query($dbconnection,$query);

    if(mysqli_num_rows($data) > 0){
        
        while($fdata = $data->fetch_object()){
            $fetchdata[]=$fdata;
        }

        // echo "<pre>";
        // print_r($fetchdata);

        echo json_encode($fetchdata) ;
    }else{

        echo json_encode(0);
    }



    

?>