<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}  ?>
<?php include 'main_header.php'; ?>
   <?php include 'topmenu.php'; ?>
   
   
   
    
<?php include 'main_footer.php'; ?>