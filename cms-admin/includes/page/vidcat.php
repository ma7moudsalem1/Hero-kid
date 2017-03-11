<?php 
if($_GET['request']){
    if($_GET['request'] == 'addcat'){
        require $page . 'addcatvid.php';
    } else if($_GET['request'] == 'delete'){
        require $codes .'vidcat.php';
    } else if($_GET['request'] == 'update'){
        require $page . 'updatecatvid.php';
    }
}else {
    $fetchAllVidCat = getData('video_category', 'video_cat_id', 'DESC');
    ?>
<section class="manage-videos">
        <h3 class="text-center">Manage Videos Categories</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center main-table">
                        <tr>
                            <td>Category Name</td>
                            <td>Last Update</td>
                            <td>Actions</td>
                        </tr>
                    <?php
                        if(!empty($fetchAllVidCat)){
                        foreach($fetchAllVidCat as $AllCatData){
                    ?>
                        <tr>
                            <td><?= $AllCatData['video_cat_name'] ?></td>
                            <td><?= $AllCatData['create_time'] ?></td>
                            <td>
                                <a href="?page=vidcat&request=delete&id=<?= $AllCatData['video_cat_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <a href="?page=vidcat&request=update&id=<?= $AllCatData['video_cat_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php  } } ?>
                </table>
            </div>
    </section>
<a href="?page=vidcat&request=addcat" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
<?php } ?>