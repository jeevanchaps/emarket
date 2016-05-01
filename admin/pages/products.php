<div class="main">
    <h1 class="title">Products</h1>
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
            <td colspan="9"><a href="<?php echo SITEURL; ?>admin/?type=addproduct"><button type="button" class="">ADD NEW</button></a></td>
        </tr>
            <tr id="HeadRow">
                <td>S.N.</td>
                <td>Product Title</td>
                <td id="hide">keywords</td>
                <td>Contact</td>
                <td>Rate</td>
                <td>Address</td>
                <td>Category</td>
                <td id="hide">Is Active</td>
                <td>Actions</td>
            </tr>
            
            <?php 
                $tbl_name="products";
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
                            $product_id=$row['product_id'];
                            $keywords=$row['keywords'];
                            $product_title=$row['product_title'];
                            $rate=$row['rate'];
                            $contact=$row['contact'];
                            $address=$row['address'];
                            $category=$row['category'];
                            $is_active=$row['is_active'];
                            ?>
                            <tr>
                                <td><?php echo $a++; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td id="hide"><?php echo $keywords; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td><?php echo $rate; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $category; ?></td>
                                <td id="hide"><?php echo $is_active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin?type=editproduct&product_id=<?php echo $product_id; ?>"><button type="button">EDIT</button></a>
                                    <a href="<?php echo SITEURL; ?>admin/delete.php?type=products&product_id=<?php echo $product_id; ?>"><button type="button">DELETE</button></a>
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