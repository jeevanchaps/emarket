<?php 
    if(isset($_POST['submit']))
    {
        $service_id=$_POST['service_id'];
        $service_title=$obj->sanitize($_POST['service_title']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $service_description=$obj->sanitize($_POST['service_description']);
        $image_title=$obj->sanitize($_POST['image_title']);
        $is_active=$obj->sanitize($_POST['is_active']);
        $search=$obj->sanitize($_POST['include_search']);
        $previous_image=$_POST['previous_image'];
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=editservice&service_id='.$service_id);
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/services/".$image_name;
            if($previous_image!="")
                {
                    $path="../images/services/".$previous_image;
                    unlink($path);
                }
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=editservice&service_id='.$service_id);
                    exit();
                }
        }
        else
        {
            $image_name=$previous_image;
        }
        $tbl_name="gtt_02_dtbl_services";
        $data="service_title='$service_title',
                keywords='$keywords',
                service_description='$service_description',
                image_name='$image_name',
                image_title='$image_title',
                is_active='$is_active',
                include_search='$search'";
        $where="service_id='$service_id'";
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['update_success']="service successfully updated.";
            header('Location:'.SITEURL.'admin/?type=services');
        }
        else
        {
            $_SESSION['update_fail']="Failed to update service. Try again.";
            header('Location:'.SITEURL.'admin?type=addservice');
        }
    }
?>
<?php 
    if(isset($_GET['service_id']))
    {
        $service_id=$_GET['service_id'];
    }
    $tbl_name="gtt_02_dtbl_services";
    $where="service_id='$service_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    if($res)
    {
        $count=$obj->count_rows($res);
        if($count==1)
        {
            $row=$obj->fetch_data($res);
            $service_title=$row['service_title'];
            $keywords=$row['keywords'];
            $service_description=$row['service_description'];
            $image_title=$row['image_title'];
            $previous_image=$row['image_name'];
            $is_active=$row['is_active'];
            $search=$row['include_search'];
        }
    }        
?>
<div class="main">
    <h1 class="title">Edit Service</h1>
    
    <h3><a href="<?php echo SITEURL; ?>admin/?type=services"><button type="button">Back</button></a></h3>
    <p>
        <?php 
            if(isset($_SESSION['invalid']))
            {
                echo $_SESSION['invalid'];
                unset($_SESSION['invalid']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['fail']))
            {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
            
        ?>
    </p>
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span class="head">Service Title: </span>
            <input type="text" name="service_title" value="<?php echo $service_title; ?>" required="true" />
        </label>
        <label>
            <span class="head">Keywords: </span>
            <textarea name="keywords" id="editor1" required="true"><?php echo $keywords; ?></textarea>
        </label>
        <label>
            <span class="head">Description: </span>
            <textarea name="service_description" id="editor1" placeholder="Description" required="true"><?php echo $service_description; ?></textarea>
        </label>
        <label>
            <span class="head">Image Title: </span>
            <input type="text" name="image_title" value="<?php echo $image_title; ?>" />
        </label>
        <?php 
            if($previous_image!=""){
        ?>
        <label>
            <span class="head">Previous Image: </span>
            <img src="<?php echo SITEURL; ?>images/services/<?php echo $previous_image;; ?>" />
            <input type="hidden" name="previous_image" value="<?php echo $previous_image; ?>" />
        </label>
        <?php } ?>
        <label>
            <span class="head">Image: </span>
            <input type="file" name="image" />
        </label>
        <label>
            <span class="head">Is Active: </span>
            <input <?php if($is_active=="yes"){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" /> YES
            <input <?php if($is_active=="no"){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" /> NO
        </label>
        <label>
            <span class="head">Include Search: </span>
            <input <?php if($search=="yes"){echo "checked='checked'";} ?> type="radio" name="include_search" value="yes" /> YES
            <input <?php if($search=="no"){echo "checked='checked'";} ?> type="radio" name="include_search" value="no" /> NO
        </label>
        <label>
            <span class="button">
                <input type="submit" name="submit" value="SAVE" />
                <input type="hidden" name="service_id" value="<?php echo $service_id; ?>" />
            </span>
        </label>
    </form>
</div>