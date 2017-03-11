<?php 
  session_start();
$pageTitle = 'Admin-Dashboard';
if(!isset($_SESSION['username'])){
     header('Location: login.php');
}
   require 'config/core.inc.php'; 
   require 'config/config.inc.php';
 ?>
                    
  <?php require $inc.'footer.inc.php'; ?>
  <?php require $inc.'ending.inc.php'; ?>
       