<?php 
    if(isset($_POST['submit']))
    {
        $owner=$obj->sanitize($_POST['full_name']);
        $email=$obj->sanitize($_POST['email']);
        $username=$obj->sanitize($_POST['username']);
        $contact=$obj->sanitize($_POST['contact']);
        $company=$obj->sanitize($_POST['company']);
        $address=$obj->sanitize($_POST['address']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $description=$obj->sanitize($_POST['description']);
        $facebook=$obj->sanitize($_POST['facebook']);
        $google_plus=$obj->sanitize($_POST['google_plus']);
        $twitter=$obj->sanitize($_POST['twitter']);
        $map=$obj->sanitize($_POST['map']);
        $image_title=$obj->sanitize($_POST['image_title']);
        if(isset($_POST['previous_image']))
        {
            $previous_image=$_POST['previous_image'];
        }
        else
        {
            $previous_image="";
        }
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
                $array = explode('.', $image);
                $ext = end($array);
                $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
                if(!in_array($ext,$allowed) ) {
                    $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                    header('Location:'.SITEURL.'admin?type=general');
                    exit();
                }
                $uniq=$obj->uniqid();
                $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
                $source=$_FILES['image']['tmp_name'];
                $destination="../images/".$image_name;
                if($previous_image!="")
                {
                    $path="../images/".$previous_image;
                    unlink($path);
                }
                $upload=move_uploaded_file($source,$destination);
                if(!$upload)
                {
                    
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=general');
                    exit();
                }
        }
        else
        {
            $image_name=$previous_image;
        }
        $tbl_name="gtt_04_dtbl_general";
        $where="general_id='1'";
        $data="owner='$owner',
                email='$email',
                username='$username',
                contact='$contact',
                company='$company',
                address='$address',
                keywords='$keywords',
                description='$description',
                facebook='$facebook',
                google_plus='$google_plus',
                twitter='$twitter',
                map='$map',
                image_title='$image_title',
                image_name='$image_name'";
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['general_success']="General settings successfully updated.";
            header('Location:'.SITEURL.'admin?type=general');
        }
        else
        {
            $_SESSION['general_fail']="Failed to update general settings.";
            header('Location:'.SITEURL.'admin?type=general');
        }
    }
?>
<?php 
    $tbl_name="gtt_04_dtbl_general";
    $where="general_id='1'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    $row=$obj->fetch_data($res);
    $full_name=$row['owner'];
    $email=$row['email'];
    $username=$row['username'];
    $password_db=$row['password'];
    $contact=$row['contact'];
    $company=$row['company'];
    $address=$row['address'];
    $keywords=$row['keywords'];
    $description=$row['description'];
    $facebook=$row['facebook'];
    $google_plus=$row['google_plus'];
    $twitter=$row['twitter'];
    $map=$row['map'];
    $previous_image=$row['image_name'];
    $image_title=$row['image_title'];
?>
            <div class="main">
                <h1 class="title">General Manager</h1>
                <p>
                    <?php 
                        if(isset($_SESSION['general_success']))
                        {
                            echo $_SESSION['general_success'];
                            unset($_SESSION['general_success']);
                        }
                        if(isset($_SESSION['general_fail']))
                        {
                            echo $_SESSION['general_fail'];
                            unset($_SESSION['general_fail']);
                        }
                        if(isset($_SESSION['password_error']))
                        {
                            echo $_SESSION['password_error'];
                            unset($_SESSION['password_error']);
                        }
                        if(isset($_SESSION['password_success']))
                        {
                            echo $_SESSION['password_success'];
                            unset($_SESSION['password_success']);
                        }
                        if(isset($_SESSION['password_fail']))
                        {
                            echo $_SESSION['password_fail'];
                            unset($_SESSION['password_fail']);
                        }
                    ?>
                </p>
                <!--General Settings Starts Here-->
                    <form method="post" action="" enctype="multipart/form-data">
                        <label>
                            <span class="head">Full Name: </span>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>" required="true" />
                        </label>
                        <label>
                            <span class="head">Email: </span>
                            <input type="email" name="email" value="<?php echo $email; ?>" required="true" />
                        </label>
                        <label>
                            <span class="head">Username: </span>
                            <input type="text" name="username" value="<?php echo $username; ?>" required="true" />
                        </label>
                        <label>
                            <span class="head">Contact: </span>
                            <input type="phone" name="contact" value="<?php echo $contact; ?>" required="true" />
                        </label>
                        <label>
                            <span class="head">Company: </span>
                            <input type="text" name="company" value="<?php echo $company; ?>" />
                        </label>
                        <label>
                            <span class="head">Address :</span>
                            <textarea name="address"><?php echo $address; ?></textarea>
                        </label>
                        <label>
                            <span class="head">Keywords: </span>
                            <textarea name="keywords" required="true"><?php echo $keywords; ?></textarea>
                        </label>
                        <label>
                            <span class="head">Description: </span>
                            <textarea name="description" required="true"><?php echo $description; ?></textarea>
                        </label>
                        <label>
                            <span class="head">Facebook: </span>
                            <input type="text" name="facebook" value="<?php echo $facebook; ?>" />
                        </label>
                        <label>
                            <span class="head">Google Plus: </span>
                            <input type="text" name="google_plus" value="<?php echo $google_plus; ?>" />
                        </label>
                        <label>
                            <span class="head">Twitter: </span>
                            <input type="text" name="twitter" value="<?php echo $twitter; ?>" />
                        </label>
                        <label>
                            <span class="head">Google Map: </span>
                            <textarea name="map"><?php echo $map; ?></textarea>
                        </label>
                        <?php 
                            if($previous_image!="")
                            {
                                ?>
                                <label>
                                    <span class="head">Previous Image: </span>
                                    <img src="<?php echo SITEURL; ?>images/<?php echo $previous_image; ?>" />
                                    <input type="hidden" name="previous_image" value="<?php echo $previous_image; ?>" />
                                </label>
                                <?php
                            }
                        ?>
                        <label>
                            <span class="head">Logo: </span>
                            <input type="file" name="image" />
                        </label>
                        <label>
                            <span class="head">Logo Title: </span>
                            <input type="text" name="image_title" value="<?php echo $image_title; ?>" />
                        </label>
                        <label>
                            <span class="button"><input type="submit" name="submit" value="UPDATE" /></span>&nbsp;<br />&nbsp;<br />&nbsp;
                        </label>
                    </form>
                    <div style="clear: both;"></div>
                    <!--General Settings Ends Here-->
                
                <span class="menu-trigger-drop">
                        CLICK TO CHANGE PASSWORD
                    </span>
                <div class="toggle-box">
                    <!--Password Settings Starts Here-->
                    <?php 
                        if(isset($_POST['password']))
                        {
                            $current_password=md5($obj->sanitize($_POST['current_password']));
                            $new_password=md5($obj->sanitize($_POST['new_password']));
                            $confirm_password=md5($obj->sanitize($_POST['confirm_password']));
                            if(($password_db!=$current_password)||($new_password!=$confirm_password))
                            {
                                $_SESSION['password_error']="Please type correct old password. And match new password and confirm password.";
                                header('Location:'.SITEURL.'admin?type=general');
                                exit();
                            }
                            $tbl_name="gtt_04_dtbl_general";
                            $where="general_id='1'";
                            $data="password='$new_password'";
                            $query=$obj->update_data($tbl_name,$data,$where);
                            $res=$obj->execute_query($conn,$query);
                            if($res)
                            {
                                $_SESSION['password_success']="Password successfully updated.";
                                header('Location:'.SITEURL.'admin?type=general');
                            }
                            else
                            {
                                $_SESSION['password_fail']="Failed to update Password.";
                                header('Location:'.SITEURL.'admin?type=general');
                            }
                        }
                    ?>
                    <form method="post" action="">
                        <label>
                            <span class="head">Current Password: </span>
                            <input type="password" name="current_password" placeholder="Current Password" required="true" />
                        </label>
                        <label>
                            <span class="head">New Password: </span>
                            <input type="password" name="new_password" placeholder="New Password" required="true" />
                        </label>
                        <label>
                            <span class="head">Confirm Password: </span>
                            <input type="password" name="confirm_password" placeholder="Confirm Password" required="true" />
                        </label>
                        <label>
                            <span class="button"><input type="submit" name="password" value="SAVE" /></span>&nbsp;<br />&nbsp;
                        </label>
                    </form>
                    <!--Password Settings Ends Here-->
                </div>
            </div>