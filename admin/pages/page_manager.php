<div class="main">
    <h1 class="title">Page Manager</h1>
    <p>
        <?php 
            if(isset($_SESSION['success']))
            {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>
    </p>
        <table id="ResponsiveTable">
            <tr id="HeadRow">
                <td>S.N.</td>
                <td>Page Title</td>
                <td id="hide">Is Active</td>
                <td>Actions</td>
            </tr>
            <?php 
                $tbl_name="gtt_07_dtbl_pages";
                $query=$obj->select_data($tbl_name);
                $res=$obj->execute_query($conn,$query);
                $a=1;
                if($res)
                {
                    while($row=$obj->fetch_data($res))
                    {
                        $page_id=$row['page_id'];
                        $page_title=$row['page_title'];
                        $is_active=$row['is_active'];
                        ?>
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $page_title; ?></td>
                            <td id="hide"><?php echo $is_active; ?></td>
                            <?php 
                                $id=base64_encode($page_id);
                            ?>
                            <td><a href="<?php echo SITEURL; ?>admin?type=editpage&pageid=<?php echo $id; ?>"><button type="button">EDIT</button></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            
            
        </table>
</div>