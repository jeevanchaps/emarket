
            <div class="main">
                <h1 class="title">Service Manager</h1>
                <p>
                    <?php 
                        if(isset($_SESSION['success']))
                        {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    ?>
                    <?php 
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                    ?>
                    <?php 
                        if(isset($_SESSION['update_success']))
                        {
                            echo $_SESSION['update_success'];
                            unset($_SESSION['update_success']);
                        }
                        if(isset($_SESSION['update_fail']))
                        {
                            echo $_SESSION['update_fail'];
                            unset($_SESSION['update_fail']);
                        }
                    ?>
                </p>
                <a href="<?php echo SITEURL; ?>admin/?type=addservice">
                    <div class="box">
                        <h2>Add New</h2>
                        <img src="<?php echo SITEURL; ?>images/icons/add.png" alt="Add New Service" title="Add New Service" /><br />
                    </div>
                </a>
                
                <?php 
                    $tbl_name="gtt_02_dtbl_services";
                    $query=$obj->select_data($tbl_name);
                    $res=$obj->execute_query($conn,$query);
                    if($res)
                    {
                        while($row=$obj->fetch_data($res))
                        {
                            $service_id=$row['service_id'];
                            $service_title=$row['service_title'];
                            $image_name=$row['image_name'];
                            $image_title=$row['image_title'];
                            $is_active=$row['is_active'];
                            $search=$row['include_search'];
                            ?>
                <div class="box">
                    <h3><?php echo $service_title; ?></h3>
                    <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" /><br />
                    <b>Is Active: <i><?php echo $is_active; ?></i></b><br />
                    <b>Include Search: <i><?php echo $search; ?></i></b><br />
                    <a href="<?php echo SITEURL; ?>admin?type=editservice&service_id=<?php echo $service_id; ?>"><button type="button">EDIT</button></a>
                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=services&service_id=<?php echo $service_id; ?>&image_name=<?php echo $image_name; ?>"><button type="button">DELETE</button></a>
                </div>
                            <?php
                        }
                    }
                ?>
                
            </div>