  
            <div class="main">
                <h1 class="title">Members manager</h1>
                <p>
                    <?php 
                        
                        if(isset($_SESSION['member_success']))
                        {
                            echo $_SESSION['member_success'];
                            unset($_SESSION['member_success']);
                        }
                        
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['member_success_update']))
                        {
                            echo $_SESSION['member_success_update'];
                            unset($_SESSION['member_success_update']);
                        }
                    ?>
                </p>
                <a href="<?php echo SITEURL; ?>admin/?type=addmember">
                    <div class="box">
                        <h2>Add New</h2>
                        <img src="<?php echo SITEURL; ?>images/icons/add.png" alt="Add New Member" title="New Member" /><br />
                    </div>
                </a>
                
                <?php 
                    $tbl_name="gtt_05_dtbl_members";
                    $query=$obj->select_data($tbl_name);
                    $res=$obj->execute_query($conn,$query);
                    if($res)
                    {
                        $count=$obj->count_rows($res);
                        if($count>0)
                        {
                            while($row=$obj->fetch_data($res))
                            {
                                $member_id=$row['member_id'];
                                $full_name=$row['full_name'];
                                $post=$row['post'];
                                $image_name=$row['image_name'];
                                $image_title=$row['image_title'];
                                $is_active=$row['is_active'];
                                ?>
                                <div class="box">
                                    <?php if($image_name!=""){ ?>
                                    <img src="<?php echo SITEURL; ?>images/members/<?php echo $image_name ?>" alt="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" />
                                    <?php } ?>
                                    <h3><?php echo $full_name; ?></h3>
                                    <b><?php echo $post; ?></b><br />
                                    <a href="<?php echo SITEURL; ?>admin?type=editmember&member_id=<?php echo $member_id; ?>"><button type="button">EDIT</button></a>
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=members&member_id=<?php echo $member_id; ?>&image_name=<?php echo $image_name; ?>"><button type="button">DELETE</button></a>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<p>No Members Found.</p>";
                        }
                    }
                ?> 
                
                
            </div>