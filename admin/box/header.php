<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <title>EMarket | Admin Panel</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>/css/admin.css" type="text/css" />
        <meta name="author" content="Vijay Thapa" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="robots" content="all,index,follow" />
        <meta name="description" content="Find All the Local Products Here." />
        <meta name="keywords" content="Vegetables, Animals, Birds, DAiry products, Local Market Developement" />
        <!--Favicon Here-->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITEURL; ?>/assets/favicon/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo SITEURL; ?>/assets/favicon/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITEURL; ?>/assets/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo SITEURL; ?>/assets/favicon/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITEURL; ?>/assets/favicon/favicon-16x16.png" />
        <link rel="manifest" href="<?php echo SITEURL; ?>/assets/favicon/manifest.json" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="<?php echo SITEURL; ?>/assets/favicon/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />
        <!--Favicon Ends Here-->
        
        <link rel="canonical" href="http://www.test.vijaythapa.com.np/" />
        <link rel="author" href="https://plus.google.com/+VijayThapa333"/>
        <link rel="publisher" href="https://plus.google.com/+VijayThapa333"/>
        
        <!--ADDING JQUERY FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/js/jquery-2.1.4.js"></script>
        <!--ADDING BXSLIDER CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>/assets/bxslider/jquery.bxslider.css" />
        <!--ADDING BXSLIDER JAVASCRIPT FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/bxslider/jquery.bxslider.min.js"></script>
        <!--ADDING FANCYBOX CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>/assets/fancybox/source/jquery.fancybox.css" />
        <!--ADDING FANCYBOX JAVASCRIPT FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/fancybox/source/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/fancybox/source/jquery.fancybox.js"></script>
        <!--ADDING JAVASCRIPT VALIDATE FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/js/validate.min.js"></script>
        
        <!--ADDING JQUERY FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>/assets/script.js"></script>
    </head>
    
    <body>
        <div class="header">
            <div class="wrapper">
            <?php 
                $tbl_name_main="gtt_04_dtbl_general";
                $query_main=$obj->select_data($tbl_name_main);
                $res_main=$obj->execute_query($conn,$query_main);
                $row_main=$obj->fetch_data($res_main);
                $image_name=$row_main['image_name'];
                $image_title=$row_main['image_title'];
                $company=$row_main['company'];
            ?>
                <a href="<?php echo SITEURL; ?>admin"><img src="<?php echo SITEURL; ?>/images/<?php echo $image_name; ?>" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" /></a>
            </div>
        </div>
        