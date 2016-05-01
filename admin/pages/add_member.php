<?php 
    if(isset($_POST['submit']))
    {
        $full_name=$obj->sanitize($_POST['full_name']);
        $post=$obj->sanitize($_POST['position']);
        $image_title=$obj->sanitize($_POST['image_title']);
        $facebook=$obj->sanitize($_POST['facebook']);
        $google_plus=$obj->sanitize($_POST['google_plus']);
        $twitter=$obj->sanitize($_POST['twitter']);
        $is_active=$_POST['is_active'];
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=addmember');
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/members/".$image_name;
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
            {
                $_SESSION['upload']="Failed to upload image.";
                header('Location:'.SITEURL.'admin?type=addmember');
                exit();
            }
        }
        else
        {
            $image_name="";
        }
        $tbl_name="gtt_05_dtbl_members";
        $data="full_name='$full_name',
                post='$post',
                image_title='$image_title',
                image_name='$image_name',
                facebook='$facebook',
                google_plus='$google_plus',
                twitter='$twitter',
                is_active='$is_active'";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['member_success']="Member successfully added.";
            header('Location:'.SITEURL.'admin?type=members');
        }
        else
        {
            $_SESSION['member_fail']="Failed to add Member";
            header('Location:'.SITEURL.'admin?type=addmember');
        }
    }
?>
<div class="main">
    <h1 class="title">Add Member</h1>
    
    <h3><a href="<?php echo SITEURL; ?>admin/?type=members"><button type="button">Back</button></a></h3>
    <p>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['invalid']))
            {
                echo $_SESSION['invalid'];
                unset($_SESSION['invalid']);
            }
            if(isset($_SESSION['member_success']))
            {
                echo $_SESSION['member_success'];
                unset($_SESSION['member_success']);
            }
            if(isset($_SESSION['member_fail']))
            {
                echo $_SESSION['member_fail'];
                unset($_SESSION['member_fail']);
            }
        ?>
    </p>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span class="head">Full Name: </span>
            <input type="text" name="full_name" placeholder="Full Name*" required="true" />
        </label>
        <label>
            <span class="head">Post: </span>
            <input type="text" name="position" placeholder="Post" />
        </label>
        <label>
            <span class="head">Image Title: </span>
            <input type="text" name="image_title" placeholder="Image Title" />
        </label>
        <label>
            <span class="head">Image: </span>
            <input type="file" name="image" />
        </label>
        <label>
            <span class="head">Facebook: </span>
            <input type="text" name="facebook" placeholder="Facebook Url" />
        </label>
        <label>
            <span class="head">Google Plus: </span>
            <input type="text" name="google_plus" placeholder="Google Plus Link" />
        </label>
        <label>
            <span class="head">Twitter: </span>
            <input type="text" name="twitter" placeholder="Twitter Link" />
        </label>
        <label>
            <span class="head">Is Active: </span>
            <input type="radio" name="is_active" value="yes" required="true" /> Yes 
            <input type="radio" name="is_active" value="no" required="true" /> No
        </label>
        <label>
            <span class="button"><input type="submit" name="submit" value="SAVE" /></span>
        </label>
    </form>
    
</div>