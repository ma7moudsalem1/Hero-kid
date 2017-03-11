<?php 
if($_GET['request']){
    if($_GET['request'] == 'addcat'){
        require $page . 'addcatread.php';
    } else if($_GET['request'] == 'delete'){
        require $codes .'readcat.php';
    } else if($_GET['request'] == 'update'){
        require $page . 'updatecatread.php';
    }
}else {
    $fetchAllReadCat = getData('reading_category', 'read_cat_id', 'DESC');
    ?>
<section class="manage-videos">
        <h3 class="text-center">Manage Stories Categories</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center main-table">
                    <tr>
                        <td>Category Name</td>
                        <td>Last Update</td>
                        <td>Actions</td>
                    </tr>
                    <?php
                        if(!empty($fetchAllReadCat)){
                        foreach($fetchAllReadCat as $AllCatData){
                    ?>
                    <tr>
                        <td><?= $AllCatData['read_cat_name'] ?></td>
                        <td><?= $AllCatData['create_time'] ?></td>
                        <td>
                            <a href="?page=readcat&action=delete&id=<?= $AllCatData['read_cat_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <a href="?page=readcat&request=update&id=<?= $AllCatData['read_cat_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                </table>
            </div>
    </section>
<a href="?page=readcat&request=addcat" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
<?php } ?>