<?php 
session_start();
if(isset($_GET['logout']) && $_GET['logout']==1){
      if(isset($_SESSION['admin_logged_in'])){
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_eamil']);
        header('location: login.php');
        exit();
      }
    }
?>