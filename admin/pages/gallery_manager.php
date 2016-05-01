<?php 
    if(isset($_POST['submit']))
    {
        $image_title=$obj->sanitize($_POST['image_title']);
        $category="gallery";
        $is_active="yes";
        if(($_FILES['image']['name'])!="")
        {
            $image=$_FILES['image']['name'];
            $array = explode('.', $image);
            $ext = end($array);
            $allowed =  array('gif','GIF','png','PNG' ,'jpg','JPG');
            if(!in_array($ext,$allowed) ) {
                $_SESSION['invalid']="Invalid Image Format. Please Try JPG, GIF or PNG Image Format.";
                header('Location:'.SITEURL.'admin?type=gallery');
                exit();
            }
            $uniq=$obj->uniqid();
            $image_name="Gurkha Tours and Travels_".$uniq.'.'.$ext;
            $source=$_FILES['image']['tmp_name'];
            $destination="../images/gallery/".$image_name;
            $upload=move_uploaded_file($source,$destination);
            if(!$upload)
                {
                    $_SESSION['upload']="Failed to upload image.";
                    header('Location:'.SITEURL.'admin?type=gallery');
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
            $_SESSION['gallery']="Banner successfully uploaded.";
            header('Location:'.SITEURL.'admin?type=gallery');
        }
        else
        {
            $_SESSION['gallery']="Failed to upload banner.";
            header('Location:'.SITEURL.'admin?type=gallery');
        }
    }
?> 
            <div class="main">
                <h1 class="title">Gallery Manager</h1>
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
                        if(isset($_SESSION['gallery']))
                        {
                            echo $_SESSION['gallery'];
                            unset($_SESSION['gallery']);
                        }
                    ?>
                </p>
                
                <div class="add">
                        <h2>Add New</h2>
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
                    $where="category='gallery'";
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
                                    <img src="<?php echo SITEURL; ?>images/gallery/<?php echo $image_name; ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" /><br />
                                    
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=gallery&image_id=<?php echo $image_id; ?>&image_name=<?php echo $image_name; ?>"><button type="button">DELETE</button></a>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<p>No Images Found</p>";
                        }
                    }
                ?>
               
            </div>