<?php 
    if(isset($_POST['submit']))
    {
        $service_title=$obj->sanitize($_POST['service_title']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $service_description=$obj->sanitize($_POST['service_description']);
        $image_title=$obj->sanitize($_POST['image_title']);
        $is_active=$obj->sanitize($_POST['is_active']);
        $search=$obj->sanitize($_POST['include_search']);
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=addservice');
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/services/".$image_name;
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=addservice');
                    exit();
                }
        }
        else
        {
            $image_name="";
        }
        $tbl_name="gtt_02_dtbl_services";
        $data="service_title='$service_title',
                keywords='$keywords',
                service_description='$service_description',
                image_name='$image_name',
                image_title='$image_title',
                is_active='$is_active',
                include_search='$search'";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['success']="New service successfully added.";
            header('Location:'.SITEURL.'admin/?type=services');
        }
        else
        {
            $_SESSION['fail']="Failed to add new service. Try again.";
            header('Location:'.SITEURL.'admin?type=addservice');
        }
    }
?>
<div class="main">
    <h1 class="title">Add New Service</h1>
    
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
            <input type="text" name="service_title" placeholder="Service Title" required="true" />
        </label>
        <label>
            <span class="head">Keywords: </span>
            <textarea name="keywords" id="editor1" placeholder="Keywords" required="true"></textarea>
        </label>
        <label>
            <span class="head">Description: </span>
            <textarea name="service_description" id="editor1" placeholder="Description" required="true"></textarea>
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
            <input type="radio" name="is_active" value="yes" /> YES
            <input type="radio" name="is_active" value="no" /> NO
        </label>
        <label>
            <span class="head">Include Search: </span>
            <input type="radio" name="include_search" value="yes" /> YES
            <input type="radio" name="include_search" value="no" /> NO
        </label>
        <label>
            <span class="button"><input type="submit" name="submit" value="SAVE" /></span>
        </label>
    </form>
</div>