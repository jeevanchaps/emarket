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
    $email=$row['email'];
    $map=$row['map'];
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $company; ?> | Contact Us</title>
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
                    <a href="<?php echo SITEURL; ?>"><img src="images/<?php echo $logo; ?>" alt="<?php echo $logo_title; ?>" title="<?php echo $logo_title; ?>" /></a>
                </div>
                <!--Logo Ends Here-->
                
                <!--Navbar Starts Here-->
                
                <span class="menu-trigger">
                    MENU
                </span>
                
                <nav class="navbar">
                    <ul>
                        <li><a href="<?php echo SITEURL; ?>">Home</a></li>
                        <li><a href="<?php echo SITEURL; ?>#services">Services</a></li>
                        <li><a class="active" href="<?php echo SITEURL; ?>contact.php">Contact</a></li>
                    </ul>
                </nav>
                <!--Navbar Ends Here-->
            </header>
        
            <div class="body">
                
                <!--Contact Form Lies Here-->
                <div class="leftpad">
                    <h2>Contact Us</h2>
                    <?php 
                        if(isset($_POST['send']))
                        {
                            $to= $email;
                            $subject=$obj->sanitize($_POST['subject']);
                            $from=$obj->sanitize($_POST['email']);
                            $full_name=$obj->sanitize($_POST['name']);
                            $contact=$obj->sanitize($_POST['contact']);
                            $txt=$obj->sanitize($_POST['message']);
                            $message=$txt.'<br/ >'.$full_name.' ['.$contact.']';
                            $send_mail=mail($to,$subject,$message,$from);
                            if($send_mail)
                            {
                                $_SESSION['email']="Message Successfully sent to admin.";
                                header('Location:'.SITEURL.'contact.php');
                            }
                            else
                            {
                                $_SESSION['email']="Message failed to sent.";
                                header('Location:'.SITEURL.'contact.php');
                            }
                        }
                    ?>
                    <p>
                        <?php 
                            if(isset($_SESSION['email'])) 
                                {
                                    echo $_SESSION['email'];
                                    unset($_SESSION['email']);
                                }
                        ?>
                    </p>
                    <form method="post" action="">
                        <input type="text" name="name" placeholder="Name" required="true" />
                        <input type="email" name="email" placeholder="Email" required="true" />
                        <input type="text" name="subject" placeholder="Subject" required="true" />
                        <input type="text" name="contact" placeholder="Phone Number" />
                        <textarea name="message" placeholder="Message"></textarea>
                        <input type="submit" name="send" value="SUBMIT" />
                    </form>
                </div>
                <!--Contact Form Ends Here-->
                
                <!--Address Lies Here-->
                    <div class="rightpad">
                        <h2>Cold Store and Breed Collection Center</h2>
                        <?php 
                            $tbl_name2="gtt_06_dtbl_point_of_contact";
                            $where2="is_active='yes'";
                            $query2=$obj->select_data($tbl_name2,$where2);
                            $res2=$obj->execute_query($conn,$query2);
                            if($res2)
                            {
                                $count=$obj->count_rows($res2);
                                if($count>0)
                                {
                                    while($row2=$obj->fetch_data($res2))
                                    {
                                        $full_name=$row2['full_name'];
                                        $post=$row2['post'];
                                        $email=$row2['email'];
                                        $contact=$row2['contact'];
                                        $country=$row2['country'];
                                        $address=$row2['address'];
                                        $po_box=$row2['po_box'];
                                        ?>
                                        <address>
                                            <h3><?php echo $country; ?></h3>
                                            <?php echo $address; ?><br />
                                            <b><?php echo $full_name; ?> [<?php echo $post; ?>]</b><br />
                                            <b>Contact: </b><?php echo $contact; ?><br />
                                            <b>PO Box: </b><?php echo $po_box; ?><br />
                                            <b>Email: </b><?php echo $email; ?> 
                                        </address>
                                        <hr />
                                        <br />
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Point of Contact Added. Please Add Some.";
                                }
                            }
                        ?>
                        
                    </div>
                <!--Address Ends Here-->
            </div>
            
            <!--Footer Starts Here-->
            <footer class="main-footer">
                
                <iframe src="<?php echo $map; ?>" frameborder="0" class="map" allowfullscreen></iframe>
                <br />
                
                <a href="<?php echo $facebook; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/facebook.png" alt="Facebook" title="Facebook" /></a>
                <a href="<?php echo $twitter; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/twitter.png" alt="Twitter" title="Twitter" /></a>
                <a href="<?php echo $google_plus; ?>" target="_blank"><img src="<?php echo SITEURL; ?>images/icons/google.png" alt="Google Plus" title="Google Plus" /></a>
                
                <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo $company; ?>. All rights reserved.</p>
                <p>Designed By: <a href="http://vijaythapa.com.np/" target="_blank" title="Creative PHP Developer and Web Designer">FIRST attempt</a></p>
            </footer>
            <!--Footer Ends Here-->
        </div>
        
    </body>
</html>