<?php
class Model
{
    public $conn = "";
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "my_e_commerce");
    }
    public function cetagory(){
        $query = "SELECT * FROM  cetagories";
        $data = mysqli_query($this->conn,$query);
        if ($data->num_rows>0) {
            while ($fdata = $data->fetch_object()) {
                $fechdata[]=$fdata;
            }
        }
        return $fechdata;
    }
    public function editcetagory($get){
        $id=$get['id'];
        $query = "SELECT * FROM  cetagories WHERE id='$id'";
        $data = mysqli_fetch_assoc(mysqli_query($this->conn,$query)) ;
        
        return $data;
    }
    public function insert($data){
        $cetagory = $data['cetagory'];
        $query = "INSERT INTO  cetagories VALUES('','$cetagory')";
        $yes = mysqli_query($this->conn, $query);   
        $a=0;
        if($yes){
            $a=1;
        }
        return $a;
}


    public function update($add)
    {
        
            $id = $add['id'];
            $cetagory=$add['cetagory'];
            
            $query = "UPDATE cetagories SET cetagory='$cetagory' WHERE id='$id'";
            $data = mysqli_query($this->conn, $query);

            if ($data>0) {
                $a=1;
            }else{
                $a=0;
            }
            return $a;
        

    }

public function delete($get){
    // $id=$get['id'];
    $query = "DELETE FROM cetagories WHERE id='$get'";
    mysqli_query($this->conn, $query);
    $a=1;
    return $a;
}
public function insertproduct($data){
    
    
    
    $Product=$data['Product'];
    $product_discription=$data['product_discription'];
    $Price=$data['Price'];
    $quantity=$data['quantity'];
    $type=$data['type'];
    $product_cetagory=$data['product_cetagory'];

    // $profile_pic = 'noimg.png';

    //     if ($data['profile_pic']) {
    //         // $request->validate([
    //         //     'img' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
    //         // ]);
    //         $tmp_name=$data['profile_pic'];
    //         $profile_pic = date('mdYHis') . uniqid() . '.' . $data['profile_pic']->extension();
    //         move_uploaded_file($tmp_name, "uploadsimg/$profile_pic");
            
    //     }
        
        $query = "INSERT INTO  product VALUES('','$Product','$product_discription','$Price','$quantity','$product_cetagory','$type','')";
        $data=mysqli_query($this->conn, $query);
}
public function product(){
    $query = "SELECT * FROM  product";
    $data = mysqli_query($this->conn,$query);
    if ($data->num_rows>0) {
        while ($fdata = $data->fetch_object()) {
            $fechdata[]=$fdata;
        }
    }
    return $fechdata;
}

public function deletepro($get){
    // $id=$get['id'];
    $query = "DELETE FROM product WHERE id='$get'";
    $data=mysqli_query($this->conn, $query);
    if($data>0){
        $a=2;
    }
    return $a;
}

public function editproductdata($get){
    $id=$get['id'];
    $query = "SELECT * FROM  product WHERE id='$id'";
    $data = mysqli_fetch_assoc(mysqli_query($this->conn,$query)) ;
    
    return $data;
}
    
}
