<?php 
   if(isset($_GET['action']))
   {
       if($_GET['action'] == 'add'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username   = $_POST['username'];
                $firstName  = $_POST['first_name'];
                $lastName   = $_POST['last_name'];
                $pass       = $_POST['new_pass'];
                $hashedpass = sha1($_POST['new_pass']);
                $Errors     = array();
              
              if(strlen($username) < 4){
                  $Errors[] =  'Username Can not be less than 4 characters';
              }
              if(strlen($firstName) < 3){
                  $Errors[] =  'First Name Can not be less than 3 characters';
              }
              if(strlen($lastName) < 3){
                  $Errors[] =  'Last Name Can not be less than 3 characters';
              }
              if(strlen($pass) < 6){
                  $Errors[] =  'Last Name Can not be less than 6 characters';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  $checker = getCountCon('username', 'admin', $username);
                  if($checker == 0){
                  Insert4Rows('username', 'admin_first_name', 'admin_last_name', 'pass', $username, $firstName, $lastName, $hashedpass, 'admin');
                    }else{
                       redirctErrorUrl('?page=admin&request=add', 'Username already exists.', 3);
                  }
                  }
             
             /* */
            } else{
              redirctErrorUrl('?page=admin', 'Sorry You hove to submit first.', 3);
            }
     
       }else{
           redirctErrorUrl('?page=admin', 'There is Something wrong.', 4);
       }
   } 
    
?>