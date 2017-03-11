<?php 
if(isset($_GET['request'])){
    if(!empty($_GET['request'])){
        if($_GET['request'] == 'add'){
            require $pages.'addAdmin.php';
        } else if($_GET['request'] == 'update') {
           require $pages.'updateAdmin.php';
        } else if($_GET['request'] == 'delete') {
            require $pages.'deleteAdmin.php';
        }
    }
}else{
    ?>

    <?php 
       $fechAllAdmins = getDataExcept('admin', 'admin_id', $adminId);
    
    ?>

    <section class="manage-admins">
        <h3 class="text-center">Manage Admins</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center main-table">
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Last Update</td>
                        <td>Actions</td>
                    </tr>
                    <?php
                        if(!empty($fechAllAdmins)){
                        foreach($fechAllAdmins as $AlladminData){
                            
                    ?>
                    <tr>
                        <td><?= $AlladminData['admin_id'] ?></td>
                        <td><?= $AlladminData['username'] ?></td>
                        <td><?= $AlladminData['admin_first_name'] ?></td>
                        <td><?= $AlladminData['admin_last_name'] ?></td>
                        <td><?= $AlladminData['create_time'] ?></td>
                        <td>
                            <a href="?page=admin&request=delete&id=<?= $AlladminData['admin_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <a href="?page=admin&request=update&id=<?= $AlladminData['admin_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
        
    </section>
        <a href="?page=admin&request=add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Admin</a>



   <?php } ?>
