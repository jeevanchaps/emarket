<?php include('includes/apply.php'); ?>
<?php ob_start(); ?>
<?php include('box/header.php'); ?>
<?php 
    if(!isset($_SESSION['username'])){
        header('Location:'.SITEURL.'admin/login.php ');
    }
?>
<?php include('box/navbar.php'); ?>
<?php include('box/main.php'); ?>
<?php include('box/footer.php'); ?>
<?php ob_end_flush(); ?>
