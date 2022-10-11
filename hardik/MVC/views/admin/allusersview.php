<div id="page-wrapper">
    <div class="main-page">
        <div class="col_3">
            <div class="clearfix"> </div>
        </div> 

        <div class="charts">
            <div class="mid-content-top charts-grids">
                <div class="middle-content">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="title">All Users List</h4>
                    </div>
                    <div class="col">
                        <a class="btn btn-sm btn-info" href="addnewuser">Add New</a>
                    </div>
                </div>

                    <table class="table table-striped table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th>Sr NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Profile pic</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=1;
                            foreach ($FetchAllUserData['data'] as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $value->fullname; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->gender; ?></td>
                                    <td><?php echo $value->mobile; ?></td>
                                    <td><img src="uploads/<?php echo $value->profile_pic; ?>" alt="no image"></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="edituser?userid=<?php echo $value->id; ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger" href="deleteuser?userid=<?php echo $value->id; ?>"><i class="fa fa-trash"></i></a>
                                        
                                    </td>
                                </tr>
                            <?php $count++;} ?>
                        </tbody>
                    </table>








                </div>
            </div>
        </div>
    </div>
</div>