<?php include('admin/includes/apply.php'); ?>
<?php 
    ob_start();
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
    $email=$row['email'];
?>
<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $tbl_name_offer="gtt_03_dtbl_offers";
        $where_offer="offer_id='$id'";
        $query_offer=$obj->select_data($tbl_name_offer,$where_offer);
        $res_offer=$obj->execute_query($conn,$query_offer);
        if($res_offer)
        {
            $row_offer=$obj->fetch_data($res_offer);
            $offer_title=$row_offer['offer_title'];
            $offer_keywords=$row_offer['keywords'];
            $offer_description=$row_offer['offer_description'];
            $offer_image=$row_offer['image_name'];
            $offer_image_title=$row_offer['image_title'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $company; ?> | <?php echo $offer_title; ?></title>
        <!--ADDING CSS FILE-->
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>css/style.css" />
        <meta name="author" content="Vijay Thapa" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="robots" content="all,index,follow" />
        <meta name="description" content="<?php echo $offer_description; ?>" />
        <meta name="keywords" content="<?php echo $offer_keywords; ?>" />
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
        <meta name="msapplication-TileImage" content="<?php echo SITEURL; ?>assets/favicon/ms-icon-144x144.png" />
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
                        <li><a href="<?php echo SITEURL; ?>">Home</a></li>
                        <li><a class="active" href="<?php echo SITEURL; ?>#services">Services</a></li>
                        <li><a href="<?php echo SITEURL; ?>contact.php">Contact</a></li>
                    </ul>
                </nav>
                <!--Navbar Ends Here-->
            </header>
        
            <div class="body">
                
                <!--About Starts Here-->
                <div class="leftpad">
                    <h2><?php echo $offer_title; ?></h2>
                    <img src="<?php echo SITEURL; ?>images/offers/<?php echo $offer_image; ?>" alt="<?php echo $offer_image_title; ?>" title="<?php echo $offer_image_title; ?>" class="cover-image" />
                    <a href="#"><button class="book" type="button">BOOK NOW</button></a>
                    <p>
                        <?php echo $offer_description; ?>
                    </p>
                    
                    <h2>Related Categories</h2>
                    
                    <!--Other Services Starts-->
                    <?php 
                        $tbl_name_offer2="gtt_03_dtbl_offers";
                        $where_offer2="offer_id!='$id' && is_active='yes' ORDER BY offer_id DESC LIMIT 3";
                        $query_offer2=$obj->select_data($tbl_name_offer2,$where_offer2);
                        $res_offer2=$obj->execute_query($conn,$query_offer2);
                        
                        if($res_offer2)
                        {
                            $count=$obj->count_rows($res_offer2);
                            if($count>0)
                            {
                                while($row_offer2=$obj->fetch_data($res_offer2))
                                {
                                    $offer_id2=$row_offer2['offer_id'];
                                    $offer_title2=$row_offer2['offer_title'];
                                    $offer_description2=substr($row_offer2['offer_description'],0,50);
                                    $offer_image2=$row_offer2['image_name'];
                                    $offer_image_title2=$row_offer2['image_title'];
                                    ?>
                                    <div class="members">
                                        <p class="writer"><?php echo $offer_title2; ?></p>
                                        <a href="<?php echo SITEURL; ?>offer.php?id=<?php echo $offer_id2; ?>">
                                            <img src="<?php echo SITEURL; ?>images/offers/<?php echo $offer_image2; ?>" alt="<?php echo $offer_image_title2; ?>" title="<?php echo $offer_image_title2; ?>" />
                                            <button type="button">Read More</button>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            
                        }
                    ?>
                    
                    <!--Other Services Ends-->
                    
                </div>
                <!--About Ends Here-->
                
                <!--Services Offers and Reviews-->
                <div class="rightpad">
                    <h2>Categories</h2>
                    <ul>
                        <?php 
                            $tbl_name_service2="gtt_02_dtbl_services";
                            $where_service2="is_active='yes'";
                            $query_service2=$obj->select_data($tbl_name_service2,$where_service2);
                            $res_service2=$obj->execute_query($conn,$query_service2);
                            if($res_service2)
                            {
                                $count=$obj->count_rows($res_service2);
                                if($count>0)
                                {
                                    while($row_service2=$obj->fetch_data($res_service2))
                                    {
                                        $service_id2=$row_service2['service_id'];
                                        $service_title2=$row_service2['service_title'];
                                        $service_image2=$row_service2['image_name'];
                                        $service_image_title2=$row_service2['image_title'];
                                        ?>
                                        <li><a href="<?php echo SITEURL; ?>service.php?id=<?php echo $service_id2; ?>"><h3><?php echo $service_title2; ?></h3></a></li>
                                        <?php
                                    }
                                }
                                
                            }
                        
                    ?>
                    </ul>
                    <hr />
                    
                    <h2>Feedback</h2>
                    <!--Feedback form Starts Here-->
                        <?php 
                                if(isset($_POST['send']))
                                {
                                    $to= $email;
                                    $from=$obj->sanitize($_POST['email']);
                                    $subject="feedback and Suggestion";
                                    $full_name=$obj->sanitize($_POST['name']);
                                    $contact=$obj->sanitize($_POST['phone']);
                                    $txt=$obj->sanitize($_POST['message']);
                                    $message=$txt.'<br/ >'.$full_name.' ['.$phone.']';
                                    $send_mail=mail($to,$subject,$message,$from);
                                    if($send_mail)
                                    {
                                        $_SESSION['feedback']="Message Successfully sent to admin.";
                                        header('Location:'.SITEURL.'offer.php?id='.$id);
                                    }
                                    else
                                    {
                                        $_SESSION['feedback']="Message failed to sent.";
                                        header('Location:'.SITEURL.'offer.php?id='.$id);
                                    }
                                }
                        ?>
                        <p>
                            <?php 
                                if(isset($_SESSION['feedback'])) 
                                {
                                    echo $_SESSION['feedback'];
                                    unset($_SESSION['feedback']);
                                }
                            ?>
                        </p>
                        <form method="post" action="">
                            <input type="text" name="name" placeholder="Name*" required="true" />
                            <input type="email" name="email" placeholder="Email*" required="true" />
                            <input type="phone" name="phone" placeholder="Phone" required="true" />
                            <textarea name="message" placeholder="Feedback and Suggestions *"></textarea>
                            <input type="submit" name="submit" value="SUBMIT" />
                        </form>
                    <!--Feedback form Starts Ends-->
                    <hr />
                </div>
                <!--Services Ends Here-->
                
                
                <!--Welcome Starts Here-->
                
                <!--Welcome Ends Here-->
                
            </div>
            
            <!--Footer Starts Here-->
            <footer class="main-footer">
                <h2>Cold Store and Breed Collection Center</h2>
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
                <a href="<?php echo $facebook; ?>" target="_blank"><img src="images/icons/facebook.png" alt="Facebook" title="Facebook" /></a>
                <a href="<?php echo $twitter; ?>" target="_blank"><img src="images/icons/twitter.png" alt="Twitter" title="Twitter" /></a>
                <a href="<?php echo $google_plus; ?>" target="_blank"><img src="images/icons/google.png" alt="Google Plus" title="Google Plus" /></a>
                
                <p>Copyright &copy; <?php echo date('Y').' '.$company; ?>. All rights reserved.</p>
                <p>Designed By: <a href="http://vijaythapa.com.np/" target="_blank" title="Creative PHP Developer and Web Designer.">Vijay Thapa</a></p>
            </footer>
            <!--Footer Ends Here-->
        </div>
        
    </body>
</html>