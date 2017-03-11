<?php

 if(isset($_GET['action']))
   {
       if($_GET['action'] == 'send'){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name        = $_POST['name'];
                $email       = $_POST['email'];
                $subject     = $_POST['subject'];
                $message     = $_POST['message'];
                $to          = 'hero.kid106@gmail.com';
                $errors      = array();
              
              if(strlen($name) < 4 || strlen($name) > 31){
                  $errors[] =  '<div class="alert alert-danger">The Name Must Be Between 4 to 30 characters</div>';
              }
              if(strlen($email) < 8 || strlen($email) > 41){
                  $errors[] =  '<div class="alert alert-danger">Email Address Must Be Between 8 to 40 characters</div>';
              }
              if(strlen($subject) < 8 || strlen($subject) > 31){
                  $errors[] =  '<div class="alert alert-danger">The Subject Must Be Between 8 to 30 characters</div>';
              }
              if(strlen($message) < 8 || strlen($message) > 151){
                  $errors[] =  '<div class="alert alert-danger">Email Address Must Be Between 8 to 150 characters</div>';
              }
              
              foreach($errors as $Error){
                  echo '<div class="alert alert-danger">'. $Error . '</div>';
              }
              
              if(empty($errors)){
                  if(mail($to, $subject, "From: ".$name." Mail: ".$email." Message: ".$message)){
                      echo '<div class="alert alert-success">Thank you '.$name.' we received your message.</div>';
                  }
              }
              
          }
           else {
           	echo '<div class="alert alert-danger">Submit First</div>';
           echo "<script>window.setTimeout(function() {window.location.href = 'index';}, 2000)</script>";
       }
       }else{
           echo '<div class="alert alert-danger">Wrong Action</div>';
           echo "<script>window.setTimeout(function() {window.location.href = 'index';}, 2000)</script>";
       }
 }
?>