<?php 
    if(isset($_POST['submit']))
    {
        $product_id=$_POST['product_id'];
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
        $where="product_id='$product_id'";
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['poc_success_update']="Product successfully Updated.";
            header('Location:'.SITEURL.'admin/?type=products');
        }
        else
        {
            $_SESSION['poc_fai_updatel']="Failed to Update Product. Try again.";
            header('Location:'.SITEURL.'admin?type=editproduct');
        }
    }
?>
<?php 
    if(isset($_GET['product_id']))
    {
        $product_id=$_GET['product_id'];
    }
    $tbl_name="products";
    $where="product_id='$product_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    if($res)
    {
        $count=$obj->count_rows($res);
        if($count==1)
        {
            $row=$obj->fetch_data($res);
            $product_title=$row['product_title'];
            $keywords=$row['keywords'];
            $rate=$row['rate'];
            $contact=$row['contact'];
            $address=$row['address'];
            $category_db=$row['category'];
            $is_active=$row['is_active'];
        }
    }
?>
<div class="main">
    <h1 class="title">Edit Point of Contact</h1>
    <a href="<?php echo SITEURL; ?>admin/?type=products"><h3><button type="button">Back</button></h3></a>
    <p>
        <?php 
            if(isset($_SESSION['poc_fail']))
            {
                echo $_SESSION['poc_fail'];
                unset($_SESSION['poc_fail']);
            }
            if(isset($_SESSION['poc_fail_update']))
            {
                echo $_SESSION['poc_fail_update'];
                unset($_SESSION['poc_fail_update']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
        ?>
    </p>
    <form method="post" action="" enctype="multipart/form-data"> 
        <label>
            <span class="head">Product Title: </span>
            <input type="text" name="product_title" value="<?php echo $product_title; ?>" required="true" />
        </label>
        <label>
            <span class="head">Keywords: </span>
            <textarea name="keywords" required="true"><?php echo $keywords ?></textarea>
        </label>
        <label>
            <span class="head">Rate: </span>
            <input type="text" name="rate" value="<?php echo $rate; ?>" />
        </label>
        <label>
            <span class="head">Contact: </span>
            <input type="text" name="contact" value="<?php echo $contact; ?>" />
        </label>
        <label>
            <span class="head">Address: </span>
            <textarea name="address" required="true"><?php echo $address; ?></textarea>
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
                            <option <?php if($category_db==$category){echo "selected='selected'";} ?> value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </label>
        <label>
            <span class="head">Is Active: </span>
            <input <?php if($is_active=="yes"){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" required="true" /> Yes
            <input <?php if($is_active=="no"){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" required="true" /> No
        </label>
        <label>
            <span class="button">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                <input type="submit" name="submit" value="SAVE" />
            </span>
        </label>
    </form>
</div>