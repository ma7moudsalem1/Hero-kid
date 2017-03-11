<?php
if(isset($_GET['request'])){
    if(!empty($_GET['request'])){
        if($_GET['request']=='delete'){
            require $codes . 'writing.php';
        }else if($_GET['request']== 'addwrite'){
            require $page . 'addwrite.php';
        }else if($_GET['request'] == 'updatewrite'){
            require $page . 'updatewrite.php';
        }else if($_GET['request'] == 'app'){
            require $codes . 'writing.php';
        }
    }
}else{
    $fetchAllWriting = getData('writing', 'writing_id', 'DESC');
    $allAppData = getRowById('app_settings', 'app_id', 1, 1);
    
?>
<section class="manage-videos">
        <h3 class="text-center">Manage Question</h3>
            <div class="table-responsive ">
                <table class="table table-responsive table-bordered text-center" id="MyTable">
                    <thead>
                        <tr>
                            <td>Questiong Image</td>
                            <td>Answer</td>
                            <td>Last Update</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                 <?php
                        if(!empty($fetchAllWriting)){
                        foreach($fetchAllWriting as $AllWritingData){
                    ?>
                        <tr>
                            <td><img src="<?= $uploadQuestion.$AllWritingData['writing_img'] ?>" class="img-resposive" alt="apple" /></td>
                            <td><?= $AllWritingData['name_of_img'] ?></td>
                            <td><?= $AllWritingData['create_time'] ?></td>
                            <td>
                                <a href="?page=writing&request=delete&id=<?= $AllWritingData['writing_id'] ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <a href="?page=writing&request=updatewrite&id=<?= $AllWritingData['writing_id'] ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
                <div class="paging"></div>
            </div>
        
    </section>
<button class="btn btn-defualt button-toggel"><i class="fa fa-cog" aria-hidden="true"></i> More Settings</button> 
<div class="vid-contents">
    <h4 class="text-center">Edit Section Description</h4>
    <form method="POST" action="?page=writing&request=app&action=updatedesc">
    <div class="form-group">
            <label for="comment">Reading Section</label>
            <textarea class="form-control" name="description_write" rows="5" id="comment"><?= $allAppData['description_write'] ?></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Save" />
        </div>
    </form>
    <a href="?page=writing&request=addwrite" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add Question</a>
</div>


<?php } ?>