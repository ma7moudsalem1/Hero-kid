<?php
//start if delete
if($_GET['request'] == 'delete'){
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            if(deleteById('videos', 'video_id', $_GET['id'], 1)){
                redirctSuccessUrl('?page=videos', 'Deleted Succussfully.', 2);
            }
            else{
                redirctErrorUrl('?page=videos', 'Unable to delete.', 2);
            }
        }else{
            redirctErrorUrl('?page=videos', 'Not Valid ID.', 1);
        }
    }else{
        redirctErrorUrl('?page=videos', 'There is Something wrong.', 1);
    }
} // end of delete if

else if($_GET['request'] == 'addvid'){
    if($_GET['action'] == 'add'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title      = $_POST['title'];
                $url        = $_POST['url'];
                $vid_cat    = $_POST['vid_cat'];
                $discv      = $_POST['discv'];
                
                $img        = $_FILES['img']['name'];
                $finalNam   = rand().'_'.date("Y-m-d"). '_' . $img;
                $img_tmp    = $_FILES['img']['tmp_name'];
            
                $Errors     = array();
    
              if(strlen($title) < 4){
                  $Errors[] =  'Video Name Can not be less than 4 characters';
              }
              if(strlen($url) < 2){
                  $Errors[] =  'Url Can not be less than 2 characters';
              }
              if(strlen($discv) < 10){
                  $Errors[] =  'Descrption Can not be less than 10 characters';
              }
              if(checkErrorImgType($img)){
                  $Errors[] =  'Check Your Image';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  
                  $checker = getCountCon('video_url', 'videos', $url);
                  if($checker == 0){
                      
                  Insert5Rows('video_title', 'video_description', 'video_url', 'videos_img', 'vid_cat', $title, $discv, $url, $finalNam, $vid_cat, 'videos');
                      
                  move_uploaded_file($img_tmp, $uploadVideo.$finalNam);
                      
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=videos';}, 2000)</script>"; 
                      
                    }else{
                      echo "<div class='alert alert-danger'>Url $url already exists</div>";
                      echo "<script>window.setTimeout(function() {window.location.href = '?page=videos&request=addvid';}, 1000)</script>";
                    }
                  }
        }else{
            echo "<div class='alert alert-danger'>Sorry You hove to submit first.</div>";
            echo "<script>window.setTimeout(function() {window.location.href = '?page=index';}, 1000)</script>";
        }
    }
}


// Start if for section descrption update
else if($_GET['request'] == 'updatevid'){
    if($_GET['action'] == 'update'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $title    = $_POST['title'];
                $url      = $_POST['url'];
                $vid_cat  = $_POST['vid_cat'];
                $discv    = $_POST['discv'];
                
                $Errors   = array();
                
                $img_tmp  = $uploadVideo;
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
              if(strlen($url) < 2){
                  $Errors[] =  'Url Can not be less than 2 characters';
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
                  $checker = checkUni('videos', 'video_url', $url, 'video_id', $Id);
                  if($checker == 0){
                      
                  update5Record('video_title', 'video_description', 'video_url', 'videos_img', 'vid_cat', $title, $discv, $url, $finalNam, $vid_cat, 'videos', 'video_id', $Id);
                      
                  move_uploaded_file($img_tmp, $uploadVideo.$finalNam);
                      
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=videos';}, 2000)</script>"; 
                      
                    }else{
                       echo '<div class="alert alert-danger">Url already exists.</div>';
                    }
                  }
                   
        } else{
            echo "<div class='alert alert-danger'>Sorry You hove to submit first.</div>";
            echo "<script>window.setTimeout(function() {window.location.href = '?page=index';}, 1000)</script>";
        }
    }
}
else if($_GET['request'] == 'app'){
    if(isset($_GET['action']))
   {
       if($_GET['action'] == 'updatedesc'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $description_vid   = $_POST['description_vid'];
                $Errors     = '';
                if(strlen($description_vid) < 4){
                  $Errors =  '<div class="alert alert-danger">This section can not be less than 4 characters</div>';
              }
              if($Errors == ''){
                  update1Record('description_vid', $description_vid, 'app_settings', 'app_id', 1);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=videos';}, 2000)</script>"; 
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
?>