<?php 
   if(isset($_GET['action']))
   {
       if($_GET['action'] == 'addcat'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name   = $_POST['name'];
                
              $Errors = array();
              if(strlen($name) < 4){
                  $Errors[] =  'Username Can not be less than 4 characters';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  $checker = getCountCon('video_cat_name', 'video_category', $name);
                  if($checker == 0){
                  InsertOne('video_cat_name','video_category', $name);
                      echo "<script>window.setTimeout(function() {window.location.href = '?page=vidcat';}, 2000)</script>";
                    }else{
                       echo '<dviv class="alert alert-danger">Category name already exists.</div>';
                       
                  }
                  }
             
             /* */
            } else{
              redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
            }
     
           /*  Start of update   */
           
       }else if($_GET['action'] == 'update'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $name         = $_POST['name'];
              $Errors       = '';
                if(strlen($name) < 2){
                  $Errors =  '<div class="alert alert-danger">This section can not be less than 4 characters</div>';
              }
              if($Errors == ''){
                  update1Record('video_cat_name', $name, 'video_category', 'video_cat_id', $Id);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=vidcat';}, 2000)</script>";
              }
                
             /* */
            } else{
                echo "<script>window.setTimeout(function() {window.location.href = '?page=inex';}, 2000)</script>";
            }
     
       }
       else{
           echo "<script>window.setTimeout(function() {window.location.href = '?page=index';}, 2000)</script>";
       }
   } //end of action

else if($_GET['request'] == 'delete'){
    if(isset($_GET['id'])){
    if(!empty($_GET['id'])){
        if(deleteById('video_category', 'video_cat_id', $_GET['id'], 1)){
            redirctSuccessUrl('?page=vidcat', 'Deleted Succussfully.', 2);
        }
        else{
            redirctErrorUrl('?page=vidcat', 'Unable to delete.', 2);
        }
    }else{
        redirctErrorUrl('?page=vidcat', 'Not Valid ID.', 2);
    }
}else{
    redirctErrorUrl('?page=vidcat', 'There is Something wrong.', 3);
}
} // end of delete section



    
?>