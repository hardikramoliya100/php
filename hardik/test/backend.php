<?php

use function PHPUnit\Framework\returnSelf;

$con = mysqli_connect('localhost','root','','test');

if(isset($_POST['fechdata'])){
    
    $data='<table class="table table-bordered table-striped" >
                <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>';
    
                
                $query="SELECT * FROM `user`";
                $result= mysqli_query($con , $query);
                if(mysqli_num_rows($result)>0){
                    $num = 1;
                    while($row = mysqli_fetch_array($result)){
                        $data .='<tr>
                        <td>'.$num.'</td>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['mobile'].'</td>
                        <td>
                          <button onclick="getdetail('.$row['id'].')" class="btn btn-warning">Edit</button>
                        </td>
                        <td>
                          <button onclick="deletedata('.$row['id'].')" class="btn btn-warning">Edit</button>
                        </td>
                        </tr>';
                        $num++;
                    }
                }
                $data .='</table>';
                $a="hardik";
                return $a;


    
}

extract($_POST);

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile'])){

    $query ="INSERT INTO `user`(`firstname`,`lastname`,`email`,`mobile`) VALUES ('$firstname','$lastname','$email','$mobile')";
    
    mysqli_query($con , $query);

    
}



