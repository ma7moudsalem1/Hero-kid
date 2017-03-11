<!-- add -->
<section class="ad-vid">
    <h4 class="text-center">Add New Question</h4>
    <form method="POST" action="?page=writing&request=addwrite&action=add" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">Image</label>
            <input type="file" class="form-control" name="img"  autocomplete="off" required />
        </div>
        <div class="form-group">
            <label class="control-label">Answer</label>
            <input type="text" class="form-control" name="answer" autocomplete="off" required />
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="Add" value="Add New Question" />
        </div>
    </form> 
</section>
<?php require $codes.'writing.php'; ?>