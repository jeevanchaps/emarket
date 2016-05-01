<div class="main">
    <h1 class="title">Point of Contact</h1>
    <p>
        <?php 
            if(isset($_SESSION['poc_success']))
            {
                echo $_SESSION['poc_success'];
                unset($_SESSION['poc_success']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['poc_success_update']))
            {
                echo $_SESSION['poc_success_update'];
                unset($_SESSION['poc_success_update']);
            }
        ?>
    </p>
    <table id="ResponsiveTable">
        <tr>
            <td colspan="6"><a href="<?php echo SITEURL; ?>admin/?type=addpointofcontact"><button type="button" class="">ADD NEW</button></a></td>
        </tr>
            <tr id="HeadRow">
                <td>S.N.</td>
                <td>Full Name</td>
                <td id="hide">Post</td>
                <td>Country</td>
                <td id="hide">Is Active</td>
                <td>Actions</td>
            </tr>
            
            <?php 
                $tbl_name="gtt_06_dtbl_point_of_contact";
                $query=$obj->select_data($tbl_name);
                $res=$obj->execute_query($conn,$query);
                $a=1;
                if($res)
                {
                    $count=$obj->count_rows($res);
                    if($count>0)
                    {
                        while($row=$obj->fetch_data($res))
                        {
                            $point_of_contact_id=$row['point_of_contact_id'];
                            $full_name=$row['full_name'];
                            $post=$row['post'];
                            $country=$row['country'];
                            $is_active=$row['is_active'];
                            ?>
                            <tr>
                                <td><?php echo $a++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td id="hide"><?php echo $post; ?></td>
                                <td><?php echo $country; ?></td>
                                <td id="hide"><?php echo $is_active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin?type=editpointofcontact&point_of_contact_id=<?php echo $point_of_contact_id; ?>"><button type="button">EDIT</button></a>
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=pointofcontact&point_of_contact_id=<?php echo $point_of_contact_id; ?>"><button type="button">DELETE</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<p>No Point of Contact Found.</p>";
                    }
                }
            ?>
            
        </table>
</div>