<?php 
                if(isset($_GET['type']))
                {
                    $type=$_GET['type'];
                }
                else
                {
                    $type="home";
                }
                
                switch($type){
                    case"home":
                    {
                        include('pages/welcome.php');
                    }
                    break;
                    case "pages":
                    {
                        include('pages/page_manager.php');
                    }
                    break;
                    case "services":
                    {
                        include('pages/service_manager.php');
                    }
                    break;
                    case "editservice":
                    {
                        include('pages/edit_service.php');
                    }
                    break;
                    case "banners":
                    {
                        include('pages/banner_manager.php');
                    }
                    break;
                    case "general":
                    {
                        include('pages/general_manager.php');
                    }
                    break;
                    case "gallery":
                    {
                        include('pages/gallery_manager.php');
                    }
                    break;
                    case "members":
                    {
                        include('pages/members_manager.php');
                    }
                    break;
                    case "editmember":
                    {
                        include('pages/edit_member.php');
                    }
                    break;
                    case "reviews":
                    {
                        include('pages/review_manager.php');
                    }
                    break;
                    case "editreview":
                    {
                        include('pages/edit_review.php');
                    }
                    break;
                    case "offers":
                    {
                        include('pages/offer_manager.php');
                    }
                    break;
                    case "editoffer":
                    {
                        include('pages/edit_offer.php');
                    }
                    break;
                    case "associations":
                    {
                        include('pages/association_manager.php');
                    }
                    break;
                    case "pointofcontact":
                    {
                        include('pages/point_of_contact.php');
                    }
                    break;
                    case "editpage":
                    {
                        include('pages/edit_page.php');
                    }
                    break;
                    case "addservice":
                    {
                        include('pages/add_service.php');
                    }
                    break;
                    case "addbanner":
                    {
                        include('pages/add_banner.php');
                    }
                    break;
                    case "addmember":
                    {
                        include('pages/add_member.php');
                    }
                    break;
                    case "addreview":
                    {
                        include('pages/add_review.php');
                    }
                    break;
                    case "addoffer":
                    {
                        include('pages/add_offer.php');
                    }
                    break;
                    case "addpointofcontact":
                    {
                        include('pages/add_point_of_contact.php');
                    }
                    break;
                    case "editpointofcontact":
                    {
                        include('pages/edit_point_of_contact.php');
                    }
                    break;
                    case "flights":
                    {
                        include('pages/flights.php');
                    }
                    break;
                    case "addflights":
                    {
                        include('pages/add_flights.php');
                    }
                    break;
                    case "editflights":
                    {
                        include('pages/edit_flights.php');
                    }
                    break;
                    case "products":
                    {
                        include('pages/products.php');
                    }
                    break;
                    case "addproduct":
                    {
                        include('pages/add_product.php');
                    }
                    break;
                    case "editproduct":
                    {
                        include('pages/edit_product.php');
                    }
                    break;
                    case "forgotpassword":
                    {
                        $new=$obj->uniqid();
                        echo $password=substr($new, 0, 8);exit();
                    }
                    break;
                    case "logout":
                    {
                        session_destroy();
                        header('Location:'.SITEURL.'admin/login.php');
                    }
                    break;
                    default:
                    {
                        include('pages/welcome.php');
                    }
                }
            ?>