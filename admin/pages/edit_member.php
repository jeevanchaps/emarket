<?php 
    if(isset($_POST['submit']))
    {
        $member_id=$_POST['member_id'];
        $full_name=$obj->sanitize($_POST['full_name']);
        $post=$obj->sanitize($_POST['position']);
        $image_title=$obj->sanitize($_POST['image_title']);
        $facebook=$obj->sanitize($_POST['facebook']);
        $google_plus=$obj->sanitize($_POST['google_plus']);
        $twitter=$obj->sanitize($_POST['twitter']);
        $is_active=$_POST['is_active'];
        $previous_image=$_POST['previous_image'];
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
            if($previous_image!="")
                {
                    $path="../images/members/".$previous_image;
                    unlink($path);
                }
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
            $image_name=$previous_image;
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
                
        $where="member_id='$member_id'";
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['member_success_update']="Member successfully added.";
            header('Location:'.SITEURL.'admin?type=members');
        }
        else
        {
            $_SESSION['member_fail_update']="Failed to add Member";
            header('Location:'.SITEURL.'admin?type=addmember');
        }
    }
?>
<?php 
    if(isset($_GET['member_id']))
    {
        $member_id=$_GET['member_id'];
    }
    $tbl_name="gtt_05_dtbl_members";
    $where="member_id='$member_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    if($res)
    {
        $count=$obj->count_rows($res);
        if($count==1)
        {
            $row=$obj->fetch_data($res);
            $full_name=$row['full_name'];
            $post=$row['post'];
            $image_title=$row['image_title'];
            $previous_image=$row['image_name'];
            $facebook=$row['facebook'];
            $google_plus=$row['google_plus'];
            $twitter=$row['twitter'];
            $is_active=$row['is_active'];
        }
    }
?>
<div class="main">
    <h1 class="title">Edit Member</h1>
    
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
            if(isset($_SESSION['member_fail_update']))
            {
                echo $_SESSION['member_fail_update'];
                unset($_SESSION['member_fail_update']);
            }
        ?>
    </p>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span class="head">Full Name: </span>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>" required="true" />
        </label>
        <label>
            <span class="head">Post: </span>
            <input type="text" name="position" value="<?php echo $post; ?>" />
        </label>
        <?php if($previous_image!=""){ ?>
        <label>
            <span class="head">Previous Image: </span>
            <img src="<?php echo SITEURL; ?>images/members/<?php echo $previous_image; ?>" />
            <input type="hidden" name="previous_image" value="<?php echo $previous_image; ?>" />
        </label>
        <?php } ?>
        <label>
            <span class="head">Image Title: </span>
            <input type="text" name="image_title" value="<?php echo $image_title; ?>" />
        </label>
        <label>
            <span class="head">Image: </span>
            <input type="file" name="image" />
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
            <span class="head">Is Active: </span>
            <input <?php if($is_active=="yes"){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" required="true" /> Yes 
            <input <?php if($is_active=="no"){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" required="true" /> No
        </label>
        <label>
            <span class="button">
                <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />
                <input type="submit" name="submit" value="SAVE" />
            </span>
        </label>
    </form>
    
</div>