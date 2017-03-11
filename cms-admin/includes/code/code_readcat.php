<?php 
if(isset($_GET['action']))
   {
       if($_GET['action'] == 'addcat'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name   = $_POST['name'];
                
              $Errors = array();
              if(strlen($name) < 4){
                  $Errors[] =  'Category Name Can not be less than 4 characters';
              }
                
              foreach($Errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($Errors)){
                  $checker = getCountCon('read_cat_name', 'reading_category', $name);
                  if($checker == 0){
                  InsertOne('read_cat_name','reading_category', $name);
                      echo "<script>window.setTimeout(function() {window.location.href = '?page=readcat';}, 2000)</script>";
                    }else{
                       redirctErrorUrl('?page=readcat', 'Category name already exists.', 2);
                  }
                  }
             
             /* */
            } else{
              redirctErrorUrl('?page=index', 'Sorry You hove to submit first.', 3);
            }
    
       }
          /*  Start of update   */
           
    else if($_GET['action'] == 'update'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $name         = $_POST['name'];
              $Errors       = '';
                if(strlen($name) < 2){
                  $Errors =  '<div class="alert alert-danger">Category Name can not be less than 2 characters</div>';
              }
              if($Errors == ''){
                  update1Record('read_cat_name', $name, 'reading_category', 'read_cat_id', $Id);
                  echo "<script>window.setTimeout(function() {window.location.href = '?page=readcat';}, 1000)</script>";
              }
                
             /* */
            } else{
                 echo "<div class='alert alert-danger'>Sorry You hove to submit first.</div>";
                echo "<script>window.setTimeout(function() {window.location.href = '?page=index';}, 1000)</script>";
            }
     
       } 
       
    //start delete

else if($_GET['action'] == 'delete'){
    if(isset($_GET['id'])){
    if(!empty($_GET['id'])){
        if(deleteById('reading_category', 'read_cat_id', $_GET['id'], 1)){
            redirctSuccessUrl('?page=readcat', 'Deleted Succussfully.', 2);
        }
        else{
            redirctErrorUrl('?page=readcat', 'Unable to delete.', 2);
        }
    }else{
        redirctErrorUrl('?page=readcat', 'Not Valid ID.', 2);
    }
}else{
    redirctErrorUrl('?page=readcat', 'There is Something wrong.', 3);
  }
} // end of delete section
    else{
         echo "<div class='alert alert-danger'>Not valid requst.</div>";
         echo "<script>window.setTimeout(function() {window.location.href = '?page=index';}, 1000)</script>";
    }
} // end of if(isset($_GET['action']))

?>