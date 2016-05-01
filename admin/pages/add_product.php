<?php 
    if(isset($_POST['submit']))
    {
        $product_title=$obj->sanitize($_POST['product_title']);
        $keywords=$obj->sanitize($_POST['keywords']);
        $rate=$obj->sanitize($_POST['rate']);
        $contact=$obj->sanitize($_POST['contact']);
        $address=$obj->sanitize($_POST['address']);
        $category=$obj->sanitize($_POST['category']);
        $is_active=$obj->sanitize($_POST['is_active']);
        
        $tbl_name="products";
        $data="product_title='$product_title',
                keywords='$keywords',
                rate='$rate',
                contact='$contact',
                address='$address',
                category='$category',
                is_active='$is_active'
                ";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['poc_success']="New Product successfully added.";
            header('Location:'.SITEURL.'admin/?type=products');
        }
        else
        {
            $_SESSION['poc_fail']="Failed to add new Product. Try again.";
            header('Location:'.SITEURL.'admin?type=addproduct');
        }
    }
?>
<div class="main">
    <h1 class="title">Add Product</h1>
    <a href="<?php echo SITEURL; ?>admin/?type=products"><h3><button type="button">Back</button></h3></a>
    <p>
        <?php 
            if(isset($_SESSION['poc_fail']))
            {
                echo $_SESSION['poc_fail'];
                unset($_SESSION['poc_fail']);
            }
        ?>
    </p>
    <form method="post" action="" enctype="multipart/form-data"> 
        <label>
            <span class="head">Product Title: </span>
            <input type="text" name="product_title" placeholder="Product Title*" required="true" />
        </label>
        <label>
            <span class="head">Keywords: </span>
            <textarea name="keywords" placeholder="Keywords"></textarea>
        </label>
        <label>
            <span class="head">Rate: </span>
            <input type="text" name="rate" placeholder="Rate" />
        </label>
        <label>
            <span class="head">Contact: </span>
            <input type="text" name="contact" placeholder="Contact Number" />
        </label>
        <label>
            <span class="head">Address: </span>
            <textarea name="address" placeholder="Address"></textarea>
        </label>
        <label>
            <span class="head">Category: </span>
            <select name="category">
                <?php 
                    $tbl_name="gtt_02_dtbl_services";
                    $query=$obj->select_data($tbl_name);
                    $res=$obj->execute_query($conn,$query);
                    if($res)
                    {
                        while($row=$obj->fetch_data($res))
                        {
                            $category=$row['service_title'];
                            ?>
                            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php
                        }
                    }
                ?>
                
            </select>
        </label>
        <label>
            <span class="head">Is Active: </span>
            <input type="radio" name="is_active" value="yes" required="true" /> Yes
            <input type="radio" name="is_active" value="no" required="true" /> No
        </label>
        <label>
            <span class="button"><input type="submit" name="submit" value="SAVE" /></span>
        </label>
    </form>
</div>