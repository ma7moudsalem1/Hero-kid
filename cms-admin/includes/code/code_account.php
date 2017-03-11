<?php 
   if(isset($_GET['action']))
   {
       if($_GET['action'] == 'update'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username   = $_POST['username'];
                $firstName  = $_POST['first_name'];
                $lastName   = $_POST['last_name'];
                $pass       = empty($_POST['new_pass']) ? $_POST['old_pass'] : sha1($_POST['new_pass']);
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
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  $checker = getCountCon('username', 'admin', $username);
                  if($checker == 0){
                  update4Record('username', 'admin_first_name', 'admin_last_name', 'pass', $username, $firstName, $lastName, $pass, 'admin', 'admin_id', $adminId);
              $_SESSION['name'] = $firstName.' '.$lastName;
                    echo "<script>window.setTimeout(function() {window.location.href = '?page=account';}, 700)</script>";
              }
                  else{
                        echo "<div class='alert alert-danger'>Username $username already exists</div>";
                      
                  }
              }
             
             /* */
            } else{
              redirctErrorUrl('?page=account', 'Sorry You hove to submit first.', 3);
            }
     
       }else{
           redirctErrorUrl('?page=account', 'There is Something wrong.', 4);
       }
   } 
    
?>