<?php 
   if(isset($_GET['action']))
   {
       if($_GET['action'] == 'update'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name       = $_POST['name'];
                $site_stmt  = $_POST['stmt'];
                $hstmt      = $_POST['hstmt'];
                $opmsg      = $_POST['opmsg'];
                $about      = $_POST['about'];
                $wmsg       = $_POST['wmsg'];
                $Errors     = array();
              
              if(strlen($name) < 4 || strlen($name) > 20){
                  $Errors[] =  '<div class="alert alert-danger">Site Name Can not be less than 4 characters</div>';
              }
              if(strlen($site_stmt) < 4 || strlen($site_stmt) > 30){
                  $Errors[] =  '<div class="alert alert-danger">Site Statement Can not be less than 4 characters</div>';
              }
              if(strlen($hstmt) < 4 || strlen($hstmt) > 50){
                  $Errors[] =  '<div class="alert alert-danger">Header Statement Can not be less than 4 characters</div>';
              }
              if(strlen($opmsg) < 4 || strlen($opmsg) > 50){
                  $Errors[] =  '<div class="alert alert-danger">Option Statement Can not be less than 4 characters</div>';
              }
              if(strlen($about) < 4){
                  $Errors[] =  '<div class="alert alert-danger">Site Descrption Can not be less than 4 characters</div>';
              }
              if(strlen($wmsg) < 4 || strlen($wmsg) > 50){
                  $Errors[] =  '<div class="alert alert-danger">Site Welcome Message Can not be less than 4 characters</div>';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  $stmt  = $conn->prepare("UPDATE app_settings SET
                                            app_name = ?, app_stm = ?,
                                            app_head_stm = ?, app_welcoming_stm = ?,
                                            app_options_stm = ?, app_description = ?
                                            ");
                $stmt->execute(array($name, $site_stmt, $hstmt, $wmsg, $opmsg, $about));
                $count = $stmt->rowCount();
                if($count > 0){
                    redirctSuccessUrl('?page=app', 'Updated Succefully', 4);
                }else{
                    redirctErrorUrl('?page=app', 'Nothing Update.', 3);
                }
              }
             
             /* */
            } else{
                 redirctErrorUrl('?page=admin', 'There is Something wrong.', 4);
            }
     
       }else{
           echo 'action is Wrong';
       }
   } 
    
?>