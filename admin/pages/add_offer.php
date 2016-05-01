<?php 
    if(isset($_POST['submit']))
    {
        $offer_title=$obj->sanitize($_POST['offer_title']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $offer_description=$obj->sanitize($_POST['offer_description']);
        $image_title=$obj->sanitize($_POST['image_title']);
        $is_active=$_POST['is_active'];
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=addoffer');
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/offers/".$image_name;
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=addoffer');
                    exit();
                }
        }
        else
        {
            $image_name="";
        }
        $tbl_name="gtt_03_dtbl_offers";
        $data="offer_title='$offer_title',
                keywords='$keywords',
                offer_description='$offer_description',
                image_title='$image_title',
                image_name='$image_name',
                is_active='$is_active'
                ";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['offer_success']="New Offer successfully added.";
            header('Location:'.SITEURL.'admin/?type=offers');
        }
        else
        {
            $_SESSION['offer_fail']="Failed to add new Offer. Try again.";
            header('Location:'.SITEURL.'admin?type=addoffer');
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
        ?>
    </p>
    <a href="<?php echo SITEURL; ?>admin/?type=offers"><h3><button type="button">Back</button></h3></a>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label>
            <span class="head">Offer Title: </span>
            <input type="text" name="offer_title" placeholder="Offer Title" required="true" />
        </label>
        <label>
            <span>Keywords: </span>
            <textarea name="keywords" placeholder="Keywords"></textarea>
        </label>
        <label>
            <span class="head">Offer Description: </span>
            <textarea name="offer_description" placeholder="Offer Description*" required="true"></textarea>
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
            <span class="head">Is Active: </span>
            <input type="radio" name="is_active" value="yes" required="true" /> YES 
            <input type="radio" name="is_active" value="no" required="true" /> NO
        </label>
        <label>
            <span class="button"><input type="submit" name="submit" value="SAVE" /></span>
        </label>
    </form>
</div>