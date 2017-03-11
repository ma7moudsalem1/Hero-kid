<?php
//start if delete
if($_GET['request'] == 'delete'){
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            if(deleteById('reading', 'read_id', $_GET['id'], 1)){
                redirctSuccessUrl('?page=reading', 'Deleted Succussfully.', 2);
            }
            else{
                redirctErrorUrl('?page=reading', 'Unable to delete.', 2);
            }
        }else{
            redirctErrorUrl('?page=reading', 'Not Valid ID.', 1);
        }
    }else{
        redirctErrorUrl('?page=reading', 'There is Something wrong.', 1);
    }
} // end of delete if

else if($_GET['request'] == 'addread'){
    if($_GET['action'] == 'add'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title      = $_POST['title'];
                $read_cat    = $_POST['read_cat'];
                $discv      = $_POST['discv'];
                
                $img        = $_FILES['img']['name'];
                $finalNam   = rand().'_'.date("Y-m-d"). '_' . $img;
                $img_tmp    = $_FILES['img']['tmp_name'];
            
                $Errors     = array();
    
              if(strlen($title) < 4){
                  $Errors[] =  'Story Title Can not be less than 4 characters';
              }
              if(strlen($discv) < 10){
                  $Errors[] =  'Story Can not be less than 10 characters';
              }
              if(checkErrorImgType($img)){
                  $Errors[] =  'Check Your Image';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                         
                  Insert4Rows('read_title', 'story', 'read_img', 'read_cat', $title, $discv, $finalNam, $read_cat, 'reading');
                      
                  move_uploaded_file($img_tmp,$uploadStory.$finalNam);
                      
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=reading';}, 2000)</script>"; 
                      
                    }
                  }
        else{
            redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
         }
        
     }
 }
//end of add story

// Start if for section descrption update
else if($_GET['request'] == 'updateread'){
    if($_GET['action'] == 'update'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $title    = $_POST['title'];
                $read_cat  = $_POST['read_cat'];
                $discv    = $_POST['discv'];
                
                $Errors   = array();
                
                $img_tmp  = $uploadStory;
                $finalNam = $_POST['oldImg'];
                if(!empty($_FILES['new']['name'])){
                   $img       =  $_FILES['new']['name'];;
                   $finalNam   = rand().'_'.date("Y-m-d"). '_' . $img;
                   $img_tmp    = $_FILES['new']['tmp_name'];
                }  
        
            // check errors
            
    
              if(strlen($title) < 4){
                  $Errors[] =  'Video Name Can not be less than 4 characters';
              }
              if(empty($discv)){
                  $Errors[] =  'Descrption Can not be blank';
              }
              if(checkErrorImgType($finalNam)){
                  $Errors[] =  'Check Your Image';
              }
            
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
            // release
            if(empty($Errors)){
                      
                  update4Record('read_title', 'story', 'read_img', 'read_cat', $title, $discv, $finalNam, $read_cat, 'reading', 'read_id', $Id);
                      
                  move_uploaded_file($img_tmp,$uploadStory.$finalNam);
                      
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=reading';}, 2000)</script>"; 
                      
                  }
                   
        } else{
            redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 2);
        }
    }
}

else if($_GET['request'] == 'app'){
    if(isset($_GET['action']))
   {
       if($_GET['action'] == 'updatedesc'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $description_read   = $_POST['description_read'];
                $Errors     = '';
                if(strlen($description_read) < 4){
                  $Errors =  '<div class="alert alert-danger">This section can not be less than 4 characters</div>';
              }
              if($Errors == ''){
                  update1Record('description_read', $description_read, 'app_settings', 'app_id', 1);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=reading';}, 2000)</script>"; 
              }
          }else{
              redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
          }
       }
    }
}  // end if for section descrption update

else{
    redirctErrorUrl('?page=reading', 'Your request not valid', 2);
}

?>