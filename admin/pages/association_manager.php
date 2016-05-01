<?php 
    if(isset($_POST['submit']))
    {
        $image_title=$obj->sanitize($_POST['image_title']);
        $is_active="yes";
        $category="associations";
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=associations');
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/partners/".$image_name;
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=associations');
                    exit();
                }
        }
        else
        {
            $image_name="";
        }
        $tbl_name="gtt_01_dtbl_images";
        $data="image_title='$image_title',
                image_name='$image_name',
                is_active='$is_active',
                category='$category'";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['associations']="Associations successfully uploaded.";
            header('Location:'.SITEURL.'admin?type=associations');
        }
        else
        {
            $_SESSION['associations']="Failed to upload Associations.";
            header('Location:'.SITEURL.'admin?type=associations');
        }
    }
?>          
            <div class="main">
                <div class="add">
                        <h2>Add New</h2>
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
                                if(isset($_SESSION['associations']))
                                {
                                    echo $_SESSION['associations'];
                                    unset($_SESSION['associations']);
                                }
                            ?>
                        </p>
                        <form method="post" action="" enctype="multipart/form-data">
                            <label>
                                <span class="head">Image Title: </span>
                                <input type="text" name="image_title" placeholder="Image Title" required="true" />
                            </label>
                            <label>
                                <span class="head">Image: </span>
                                <input type="file" name="image" />
                            </label>
                            <label>
                                <input type="submit" name="submit" value="ADD" />
                                &nbsp;&nbsp;
                            </label>
                        </form>
                    </div>
                    <?php 
                    $tbl_name="gtt_01_dtbl_images";
                    $where="category='associations'";
                    $query=$obj->select_data($tbl_name,$where);
                    $res=$obj->execute_query($conn,$query);
                    if($res)
                    {
                        $count=$obj->count_rows($res);
                        if($count>0)
                        {
                            while($row=$obj->fetch_data($res))
                            {
                                $image_id=$row['image_id'];
                                $image_title=$row['image_title'];
                                $image_name=$row['image_name'];
                                ?>
                                <div class="box">
                                    <h3><?php echo $image_title; ?></h3>
                                    <img src="<?php echo SITEURL; ?>images/partners/<?php echo $image_name; ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" /><br />
                                    
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=associations&image_id=<?php echo $image_id; ?>&image_name=<?php echo $image_name; ?>"><button type="button">DELETE</button></a>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<p>No Associations Found</p>";
                        }
                    }
                ?>
               
            </div>