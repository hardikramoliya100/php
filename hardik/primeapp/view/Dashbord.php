<?php
 if(!isset($_SESSION['userdata']['id'])){
    header("location:login");
    echo "<pre>";
    print_r($_SESSION['userdata']);

    echo "Today is " . date("Y/m/d");
 }

?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    USER DATA
                </div>
                <div class="card-body">
                <div class="row">
                            <div class="col">
                                <label for="">User Name:</label>     <?php echo $_SESSION['userdata']['username']; ?>    
                            </div>
                        </div>
                <div class="row">
                            <div class="col">
                                <label for="">first name:</label>     <?php echo $_SESSION['userdata']['firstname']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">last name:</label>     <?php echo $_SESSION['userdata']['lastname']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">email:</label>     <?php echo $_SESSION['userdata']['email']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">date of birth:</label>     <?php echo $_SESSION['userdata']['date']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">JOINED:</label>     <?php echo $_SESSION['userdata']['join_date']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">Last Login:</label>     <?php echo $_SESSION['userdata']['lastlog']; ?>    
                            </div>
                        </div><br>
                <div class="row">
                            <div class="col">
                                <label for="">image</label>     <img src="uploads/<?php echo $_SESSION['userdata']['profile_pic'] ?>" alt="no image">    
                            </div>
                        </div><br>

                        <a href="logout">logout</a>

                        

                </div>
            </div>
        </div>
    </div>

</div>