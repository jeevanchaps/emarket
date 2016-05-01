            
            <div class="main">
                <h1 class="title">Offer Manager</h1>
                <p>
                    <?php 
                        if(isset($_SESSION['offer_success']))
                        {
                            echo $_SESSION['offer_success'];
                            unset($_SESSION['offer_success']);
                        }
                        if(isset($_SESSION['offer_success_update']))
                        {
                            echo $_SESSION['offer_success_update'];
                            unset($_SESSION['offer_success_update']);
                        }
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
                <a href="<?php echo SITEURL; ?>admin/?type=addoffer">
                    <div class="box">
                        <h2>Add New</h2>
                        <img src="<?php echo SITEURL; ?>images/icons/add.png" alt="Add New Offer" title="Add New Offer" /><br />
                    </div> 
                </a>
                
                <?php 
                    $tbl_name="gtt_03_dtbl_offers";
                    $query=$obj->select_data($tbl_name);
                    $res=$obj->execute_query($conn,$query);
                    if($res)
                    {
                        $count=$obj->count_rows($res);
                        if($count>0)
                        {
                            while($row=$obj->fetch_data($res))
                            {
                                $offer_id=$row['offer_id'];
                                $offer_title=$row['offer_title'];
                                $image_name=$row['image_name'];
                                $image_title=$row['image_title'];
                                $is_active=$row['is_active'];
                                ?>
                                <div class="box">
                                    <h3><?php echo $offer_title; ?></h3>
                                    <?php if($image_name!=""){ ?>
                                    <img src="<?php echo SITEURL; ?>images/offers/<?php echo $image_name; ?>" alt="Offer" title="Offer" /><br />
                                    <?php } ?>
                                    <b>Is Active: <i><?php echo $is_active; ?></i></b><br />
                                    <a href="<?php echo SITEURL; ?>admin?type=editoffer&offer_id=<?php echo $offer_id; ?>"><button type="button">EDIT</button></a>
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=offers&offer_id=<?php echo $offer_id; ?>&image_name=<?php echo $image_name; ?>"><button type="button">DELETE</button></a>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<p>No Offers Added.</p>";
                        }
                    }
                ?>
                
            </div>