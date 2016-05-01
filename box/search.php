                    <h2>Search Products</h2>
                        <form method="post" action="">
                            <input type="text" name="keywords" placeholder="keywords" placeholder="Keywords" required="true" />
                            <input type="submit" name="submit" value="SEARCH" />
                        </form>
                        <table id="ResponsiveTable">
                            <tr id="HeadRow">
                                <td id="hide">S.N.</td>
                                <td>Product Name</td>
                                <td>Rate</td>
                                <td>Contact</td>
                                <td>Category</td>
                                <td>Address</td>
                            </tr>
                            <?php 
                                if(isset($_POST['submit']))
                                {
                                    $keywords=$obj->sanitize($_POST['keywords']);
                                    $tbl_name="products";
                                    $where="keywords LIKE '%$keywords%' OR product_title LIKE '%$keywords%' OR address LIKE '%$keywords%'";
                                    $query=$obj->select_data($tbl_name,$where);
                                    $res=$obj->execute_query($conn,$query);
                                    $a=1;
                                    if($res)
                                    {
                                        $count=$obj->count_rows($res);
                                        if($count>0)
                                        {
                                            while($row=$obj->fetch_data($res))
                                            {
                                                $product_title=$row['product_title'];
                                                $rate=$row['rate'];
                                                $contact=$row['contact'];
                                                $address=$row['address'];
                                                $category=$row['category'];
                                                ?>
                                                <tr>
                                                    <td id="hide"><?php echo $a++; ?></td>
                                                    <td><?php echo $product_title; ?></td>
                                                    <td><?php echo $rate; ?></td>
                                                    <td><?php echo $contact ?></td>
                                                    <td><?php echo $address; ?></td>
                                                    <td><?php echo $category; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Products Found";
                                        }
                                    }
                                }
                            ?>
                            
                        </table>