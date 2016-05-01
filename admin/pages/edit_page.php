<?php 
        if(isset($_GET['pageid']))
        {
            $id=base64_decode($_GET['pageid']);
        }
        $tbl_name="gtt_07_dtbl_pages";
        $where="page_id='$id'";
        $query=$obj->select_data($tbl_name,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $row=$obj->fetch_data($res);
            $page_title=$row['page_title'];
            $keywords=$row['keywords'];
            $page_description=$row['page_description'];
            $previous_image=$row['image_name'];
            $image_title=$row['image_title'];
            $is_active=$row['is_active'];
        }
    ?>
    <?php 
        if(isset($_POST['submit']))
        {
            $page_id=$obj->sanitize($_POST['page_id']);
            $page_title=$obj->sanitize($_POST['page_title']);
            $keywords=$obj->sanitize($_POST['keywords']);
            $page_description=$obj->sanitize($_POST['description']);
            $image_title=$obj->sanitize($_POST['image_title']);
            $is_active=$obj->sanitize($_POST['is_active']);
            $id=base64_encode($page_id);
            if(isset($_POST['previous_image']))
            {
                $previous_image=$obj->sanitize($_POST['previous_image']);
            }
            else{
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
                    header('Location:'.SITEURL.'admin?type=editpage&pageid='.$id);
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
                    header('Location:'.SITEURL.'admin?type=editpage&pageid='.$id);
                    exit();
                }
            }
            else{
                $image_name=$previous_image;
            }
            $tbl_name="gtt_07_dtbl_pages";
            $data="page_title='$page_title',
                    keywords='$keywords',
                    page_description='$page_description',
                    image_title='$image_title',
                    image_name='$image_name',
                    is_active='$is_active'";
            $where="page_id='$page_id'";
            $query=$obj->update_data($tbl_name,$data,$where);
            $res=$obj->execute_query($conn,$query);
            if($res)
            {
                $_SESSION['success']="Page Successfully Updated.";
                header('Location:'.SITEURL.'admin?type=pages');
            }
            else{
                $id=base64_encode($page_id);
                $_SESSION['fail']="Failed to Update Page.";
                header('Location:'.SITEURL.'admin?type=editpage&pageid='.$id);
            }
        }
    ?>
<div class="main">
    <h1 class="title">EDIT PAGE</h1>
    
    <h3><a href="<?php echo SITEURL; ?>admin/?type=pages"><button type="button">Back</button></a></h3>
    <p>
    <?php 
        if(isset($_SESSION['fail']))
        {
            echo $_SESSION['fail'];
            unset($_SESSION['fail']);
        }
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
    ?>
    </p>
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span>Page Title: </span>
            <input type="text" name="page_title" value="<?php echo $page_title; ?>" required="true" />
        </label>
        <label>
                <span>Keywords: </span>
                <textarea name="keywords" required="true"><?php echo $keywords; ?></textarea>
        </label>
        <label>
            <span>Description: </span>
            <textarea name="description"><?php echo $page_description; ?></textarea>
        </label>
        <?php 
            if($previous_image!="")
            {
                ?>
        <label>
            <span>Previous Image: </span>
            <img src="<?php echo SITEURL; ?>images/<?php echo $previous_image; ?>" />
            <input type="hidden" name="previous_image" value="<?php echo $previous_image; ?>" />
        </label>
                <?php
            }
        ?>
        <label>
            <span>Image: </span>
            <input type="file" name="image" />
        </label>
        <label>
            <span>Image Title: </span>
            <input type="text" name="image_title" value="<?php echo $image_title; ?>" />
        </label>
        <label>
            <span>Is Active: </span>
            <input <?php if($is_active=='yes'){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" /> YES 
            <input <?php if($is_active=='no'){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" /> NO
        </label>
        <label>
            <span>
                <input type="hidden" name="page_id" value="<?php echo $id; ?>" />
                <input type="submit" name="submit" value="SAVE" />
            </span>
        </label>
    </form>
    
</div>