<?php
//start if delete
if($_GET['request'] == 'delete'){
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            if(deleteById('writing', 'writing_id', $_GET['id'], 1)){
                redirctSuccessUrl('?page=writing', 'Deleted Succussfully.', 2);
            }
            else{
                redirctErrorUrl('?page=writing', 'Unable to delete.', 2);
            }
        }else{
            redirctErrorUrl('?page=writing', 'Not Valid ID.', 1);
        }
    }else{
        redirctErrorUrl('?page=writing', 'There is Something wrong.', 1);
    }
} // end of delete if

else if($_GET['request'] == 'addwrite'){
    if($_GET['action'] == 'add'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $answer      = strtolower($_POST['answer']);
                
                $img        = $_FILES['img']['name'];
                $finalNam   = rand().'_'.date("Y-m-d"). '_' . $img;
                $img_tmp    = $_FILES['img']['tmp_name'];
            
                $Errors     = array();
    
              if(strlen($answer) == 0){
                  $Errors[] =  'The answer can not be blank';
              }
              if(checkErrorImgType($img)){
                  $Errors[] =  'Check Your Image';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                         
                  Insert4Rows('writing_id', 'writing_img', 'name_of_img', 'create_time', '', $finalNam, $answer, date('Y-m-d H:i:s'), 'writing');
                      
                  move_uploaded_file($img_tmp,$uploadQuestion.$finalNam);
                      
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=writing&request=addwrite';}, 2000)</script>";
                      
                    }
                  }
        else{
            redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
         }
        
     }
 }

// Start if for section descrption update
else if($_GET['request'] == 'updatewrite'){
    if($_GET['action'] == 'update'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $answer    = $_POST['answer'];
    
                $Errors   = array();
                
                $img_tmp  = $uploadQuestion;
                $finalNam = $_POST['oldImg'];
                if(!empty($_FILES['new']['name'])){
                   $img       =  $_FILES['new']['name'];;
                   $finalNam   = rand().'_'.date("Y-m-d"). '_' . $img;
                   $img_tmp    = $_FILES['new']['tmp_name'];
                }  
        
            // check errors
            
    
              if(strlen($answer) == 0){
                  $Errors[] =  'Answer Can not be blank';
              }
             
              if(checkErrorImgType($finalNam)){
                  $Errors[] =  'Check Your Image';
              }
            
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
            // release
            if(empty($Errors)){
                      
                  update3Record('writing_img', 'name_of_img', 'create_time', $finalNam, $answer, date('Y-m-d H:i:s'), 'writing', 'writing_id', $Id);
                      
                  move_uploaded_file($img_tmp, $uploadQuestion.$finalNam);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=writing';}, 2000)</script>";                  
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
                $description_vid   = $_POST['description_write'];
                $Errors     = '';
                if(strlen($description_vid) < 4){
                  $Errors =  '<div class="alert alert-danger">This section can not be less than 4 characters</div>';
              }
              if($Errors == ''){
                  update1Record('description_write', $description_vid, 'app_settings', 'app_id', 1);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=writing';}, 2000)</script>"; 
              }
          }else{
              redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
          }
       }
    }
}  // end if for section descrption update

else{
    redirctErrorUrl('?page=videos', 'Your request not valid', 2);
}