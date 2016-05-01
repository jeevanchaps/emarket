<?php 
    if(isset($_POST['submit']))
    {
        $offer_id=$_POST['offer_id'];
        $offer_title=$obj->sanitize($_POST['offer_title']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $offer_description=$obj->sanitize($_POST['offer_description']);
        $image_title=$obj->sanitize($_POST['image_title']);
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
                header('Location:'.SITEURL.'admin?type=editoffer&offer_id='.$offer_id);
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/offers/".$image_name;
            if($previous_image!="")
                {
                    $path="../images/offers/".$previous_image;
                    unlink($path);
                }
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=type=editoffer&offer_id='.$offer_id);
                    exit();
                }
        }
        else
        {
            $image_name=$previous_image;
        }
        $tbl_name="gtt_03_dtbl_offers";
        $data="offer_title='$offer_title',
                keywords='$keywords',
                offer_description='$offer_description',
                image_title='$image_title',
                image_name='$image_name',
                is_active='$is_active'
                ";
        $where="offer_id='$offer_id'";
        
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['offer_success_update']="Offer successfully Updated.";
            header('Location:'.SITEURL.'admin/?type=offers');
        }
        else
        {
            $_SESSION['offer_fail_update']="Failed to update Offer. Try again.";
            header('Location:'.SITEURL.'admin?type=addoffer');
        }
    }
?>
<?php 
    if(isset($_GET['offer_id']))
    {
        $offer_id=$_GET['offer_id'];
    }
    $tbl_name="gtt_03_dtbl_offers";
    $where="offer_id='$offer_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    if($res)
    {
        $count=$obj->count_rows($res);
        if($count==1)
        {
            $row=$obj->fetch_data($res);
            $offer_title=$row['offer_title'];
            $keywords=$row['keywords'];
            $offer_description=$row['offer_description'];
            $image_title=$row['image_title'];
            $previous_image=$row['image_name'];
            $is_active=$row['is_active'];
        }
    }
?>
<div class="main">
    <h1 class="title">Add Offer</h1>
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
            if(isset($_SESSION['offer_fail']))
            {
                echo $_SESSION['offer_fail'];
                unset($_SESSION['offer_fail']);
            }
            if(isset($_SESSION['offer_fail_update']))
            {
                echo $_SESSION['offer_fail_update'];
                unset($_SESSION['offer_fail_update']);
            }
        ?>
    </p>
    <a href="<?php echo SITEURL; ?>admin/?type=offers"><h3><button type="button">Back</button></h3></a>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span class="head">Offer Title: </span>
            <input type="text" name="offer_title" value="<?php echo $offer_title; ?>" required="true" />
        </label>
        <label>
            <span>Keywords: </span>
            <textarea name="keywords"><?php echo $keywords; ?></textarea>
        </label>
        <label>
            <span class="head">Offer Description: </span>
            <textarea name="offer_description" required="true"><?php echo $offer_description; ?></textarea>
        </label>
        <?php if($previous_image!=""){ ?>
        <label>
            <span class="head">Previous Image: </span>
            <img src="<?php echo SITEURL; ?>images/offers/<?php echo $previous_image; ?>" />
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
            <span class="head">Is Active: </span>
            <input <?php if($is_active=="yes"){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" required="true" /> YES 
            <input <?php if($is_active=="no"){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" required="true" /> NO
        </label>
        <label>
            <span class="button">
                <input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>" />
                <input type="submit" name="submit" value="SAVE" />
            </span>
        </label>
    </form>
</div>