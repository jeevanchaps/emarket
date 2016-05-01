<?php include('admin/includes/apply.php'); 
    ob_start();
?>
<?php 
    $tbl_name="gtt_04_dtbl_general";
    $general_id=1;
    $where="general_id='$general_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    $row=$obj->fetch_data($res);
    $company=$row['company'];
    $facebook=$row['facebook'];
    $google_plus=$row['google_plus'];
    $twitter=$row['twitter'];
    $logo=$row['image_name'];
    $logo_title=$row['image_title'];
    $keywords=$row['keywords'];
    $description=$row['description'];
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $company; ?></title>
        <!--ADDING CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>css/style.css" />
        <meta name="author" content="Vijay Thapa" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="robots" content="all,index,follow" />
        <meta name="description" content="<?php echo $description; ?>" />
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <!--Favicon Here-->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITEURL; ?>assets/favicon/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo SITEURL; ?>assets/favicon/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITEURL; ?>assets/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo SITEURL; ?>assets/favicon/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITEURL; ?>assets/favicon/favicon-16x16.png" />
        <link rel="manifest" href="<?php echo SITEURL; ?>assets/favicon/manifest.json" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />
        <!--Favicon Ends Here-->
        
        <link rel="canonical" href="http://www.test.vijaythapa.com.np/" />
        <link rel="author" href="https://plus.google.com/+VijayThapa333"/>
        <link rel="publisher" href="https://plus.google.com/+VijayThapa333"/>
        
        <!--ADDING JQUERY FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/js/jquery-2.1.4.js"></script>
        <!--ADDING BXSLIDER CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>assets/bxslider/jquery.bxslider.css" />
        <!--ADDING BXSLIDER JAVASCRIPT FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/bxslider/jquery.bxslider.min.js"></script>
        <!--ADDING FANCYBOX CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>assets/fancybox/source/jquery.fancybox.css" />
        <!--ADDING FANCYBOX JAVASCRIPT FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/fancybox/source/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/fancybox/source/jquery.fancybox.js"></script>
        <!--ADDING JAVASCRIPT VALIDATE FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/js/validate.min.js"></script>
        <!--ADDING JQUERY FILE-->
        <script type="text/javascript" src="<?php echo SITEURL; ?>assets/script.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <header class="main-header">
                <!--Logo Starts Here-->
                <div class="logo">
                    <a href="<?php echo SITEURL; ?>"><img src="<?php echo SITEURL; ?>images/<?php echo $logo; ?>" alt="<?php echo $logo_title; ?>" title="<?php echo $logo_title; ?>" /></a>
                </div>
                <!--Logo Ends Here-->
                
                <!--Navbar Starts Here-->
                
                <span class="menu-trigger">
                    MENU
                </span>
                
                <nav class="navbar">
                    <ul>
                        <li><a class="active" href="<?php echo SITEURL; ?>">Home</a></li>
                        <li><a href="<?php echo SITEURL; ?>#services">Services</a></li>
                        <li><a href="<?php echo SITEURL; ?>contact.php">Contact</a></li>
                    </ul>
                </nav>
                <!--Navbar Ends Here-->
            </header>
        
            <div class="body">
                <!--Banner Starts Here-->
                <div class="banner">
                    <ul class="bxslider">
                        <?php 
                            $tbl_name2="gtt_01_dtbl_images";
                            $where2="category='banner'";
                            $query2=$obj->select_data($tbl_name2,$where2);
                            $res2=$obj->execute_query($conn,$query2);
                            if($res2)
                            {
                                $count=$obj->count_rows($res2);
                                if($count>0)
                                {
                                    while($row2=$obj->fetch_data($res2))
                                    {
                                        $image_name=$row2['image_name'];
                                        $image_title=$row2['image_title'];
                                        ?>
                                        <li><img src="<?php echo SITEURL; ?>images/banner/<?php echo $image_name; ?>" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" /></li>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
                <!--Banner Starts Ends-->
                
                <!--Welcome Starts Here-->
                <div class="welcome">
                    <h1>Welcome to <?php echo $company; ?></h1>
                    <p>
                        Rural e-market is the web app which helps to set up the direct communication between farmers and the consumers.The main objectives behind this app is to eradicate the problem of brokers. 
                    </p>
                </div>
                <!--Welcome Ends Here-->
                
                <!--Search Starts Here-->
                <div class="search">
                    <fieldset>
                        <?php include('box/search.php'); ?>
                    </fieldset>
                </div>
                <!--Search Ends Here-->
                
                <!--Services Starts Here-->
                <a name="services"></a>
                <div class="services">
                    <h1>CATEGORIES</h1>
                </div>
                    <?php 
                        $tbl_name3="gtt_02_dtbl_services";
                        $where3="is_active='yes'";
                        $query3=$obj->select_data($tbl_name3,$where3);
                        $res3=$obj->execute_query($conn,$query3);
                        if($res3)
                        {
                            $count2=$obj->count_rows($res3);
                            if($count2>0)
                            {
                                while($row3=$obj->fetch_data($res3))
                                {
                                    $service_id=$row3['service_id'];
                                    $service_title=$row3['service_title'];
                                    $image_name=$row3['image_name'];
                                    $image_title=$row3['image_title'];
                                    $service_description=substr($row3['service_description'],0,100);
                                    ?>
                                    <div class="service-box">
                                        <h2><?php echo $service_title; ?></h2>
                                        <a href="<?php echo SITEURL; ?>service.php?cat=<?php echo $service_title; ?>"><img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" /></a>
                                        <p>
                                            <?php echo $service_description; ?>
                                        </p>
                                        <a href="<?php echo SITEURL; ?>service.php?cat=<?php echo $service_title; ?>"><button type="button">Search Now</button></a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                    
                <!--Services Ends Here-->
                <!--Packages Starts Here-->
                    
                    <?php 
                        $tbl_name_offer="gtt_03_dtbl_offers";
                        $where_offer="is_active='yes' ORDER BY offer_id DESC LIMIT 2";
                        $query_offer=$obj->select_data($tbl_name_offer,$where_offer);
                        $res_offer=$obj->execute_query($conn,$query_offer);
                        if($res_offer)
                        {
                            while($row_offer=$obj->fetch_data($res_offer))
                            {
                                $offer_id=$row_offer['offer_id'];
                                $offer_title=$row_offer['offer_title'];
                                $offer_description=substr($row_offer['offer_description'],0,150);
                                $image_name=$row_offer['image_name'];
                                $image_title=$row_offer['image_title'];
                                ?>
                                <div class="packages">
                                    <h2><?php echo $offer_title; ?></h2>
                                    <a href="<?php echo SITEURL; ?>offer.php?id=<?php echo $offer_id; ?>"><img src="<?php echo SITEURL; ?>images/offers/<?php echo $image_name; ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" /></a>
                                    <p>
                                        <?php echo $offer_description; ?>
                                    </p>
                                    <a href="<?php echo SITEURL; ?>offer.php?id=<?php echo $offer_id; ?>">Read More</a>    
                                </div>
                                <?php
                            }
                        }
                    ?>
                
                
                <!--Packages Ends Here-->
                
                <!--Partners Starts Here-->
                <div class="partners">
                    <h1>Associated With</h1>
                    <marquee id='scroll_news' >
                        <div onMouseOver="document.getElementById('scroll_news').stop();" onMouseOut="document.getElementById('scroll_news').start();">
                            <?php 
                                $tbl_name_partners="gtt_01_dtbl_images";
                                $where_partners="category='associations'";
                                $query_partners=$obj->select_data($tbl_name_partners,$where_partners);
                                $res_partners=$obj->execute_query($conn,$query_partners);
                                if($res_partners)
                                {
                                    while($row_partners=$obj->fetch_data($res_partners))
                                    {
                                        $image_name=$row_partners['image_name'];
                                        $image_title=$row_partners['image_title'];
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/partners/<?php echo $image_name; ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" />
                                        <?php
                                    }
                                }
                            ?>
                            </div>
                    </marquee>
                </div>
                <!--Partners Ends Here-->
                
            </div>
            
            <!--Footer Starts Here-->
            <footer class="main-footer">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.1025445110567!2d85.30877442442923!3d27.714119991877638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcf7979973%3A0x36be106bda65cd13!2sGurkha+Adventures+-+CLIMB%2C+HIKE%2C+RIDE%2C+PADDLE!5e0!3m2!1sen!2snp!4v1449072812682" 
                frameborder="0" class="map" allowfullscreen></iframe>
                <br />
                <h2>Cold Store And Breed Collection Center</h2>
                <?php 
                    $tbl_name_poc="gtt_06_dtbl_point_of_contact";
                    $where_poc="is_active='yes'";
                    $query_poc=$obj->select_data($tbl_name_poc,$where_poc);
                    $res_poc=$obj->execute_query($conn,$query_poc);
                    if($res_poc)
                    {
                        $count=$obj->count_rows($res_poc);
                        if($count>0)
                        {
                            while($row_poc=$obj->fetch_data($res_poc))
                            {
                                $full_name=$row_poc['full_name'];
                                $post=$row_poc['post'];
                                $email=$row_poc['email'];
                                $contact=$row_poc['contact'];
                                $country=$row_poc['country'];
                                $address=$row_poc['address'];
                                $po_box=$row_poc['po_box'];
                                ?>
                                <div class="poc">
                                    <address>
                                        <h3><?php echo $country; ?></h3>
                                        <?php echo $address; ?><br />
                                        <b><?php echo $full_name; ?> [<?php echo $post; ?>]</b><br />
                                        <b>Contact: </b><?php echo $contact; ?><br />
                                        <b>PO Box: </b><?php echo $po_box; ?><br />
                                        <b>Email: </b><?php echo $email; ?> 
                                    </address>                       
                                </div>
                                <?php
                            }
                        }
                    }
                ?>
                <div style="clear: both;"></div>
                <a href="<?php echo $facebook; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/facebook.png" alt="Facebook" title="Facebook" /></a>
                <a href="<?php echo $twitter; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/twitter.png" alt="Twitter" title="Twitter" /></a>
                <a href="<?php echo $google_plus; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/google.png" alt="Google Plus" title="Google Plus" /></a>
                
                <p>Copyright &copy; <?php echo date('Y').' '.$company; ?>. All rights reserved.</p>
                <p>Designed By: <a href="http://vijaythapa.com.np/" target="_blank" title="Creative PHP Developer and Web Designer">FIRST attempt</a></p>
            </footer>
            <!--Footer Ends Here-->
        </div>
        
    </body>
</html>