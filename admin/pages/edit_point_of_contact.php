<?php 
    if(isset($_POST['submit']))
    {
        $point_of_contact_id=$_POST['point_of_contact_id'];
        $full_name=$obj->sanitize($_POST['full_name']);
        $post=$obj->sanitize($_POST['post']);
        $email=$obj->sanitize($_POST['email']);
        $contact=$obj->sanitize($_POST['contact']);
        $country=$obj->sanitize($_POST['country']);
        $address=$obj->sanitize($_POST['address']);
        $po_box=$obj->sanitize($_POST['po_box']);
        $is_active=$obj->sanitize($_POST['is_active']);
        $tbl_name="gtt_06_dtbl_point_of_contact";
        $data="full_name='$full_name',
                post='$post',
                email='$email',
                contact='$contact',
                country='$country',
                address='$address',
                po_box='$po_box',
                is_active='$is_active'
                ";
        $where="point_of_contact_id='$point_of_contact_id'";
        $query=$obj->update_data($tbl_name,$data,$where);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['poc_success_update']="Point of Contact successfully Updated.";
            header('Location:'.SITEURL.'admin/?type=pointofcontact');
        }
        else
        {
            $_SESSION['poc_fai_updatel']="Failed to add new Point of Contact. Try again.";
            header('Location:'.SITEURL.'admin?type=addpointofcontact');
        }
    }
?>
<?php 
    if(isset($_GET['point_of_contact_id']))
    {
        $point_of_contact_id=$_GET['point_of_contact_id'];
    }
    $tbl_name="gtt_06_dtbl_point_of_contact";
    $where="point_of_contact_id='$point_of_contact_id'";
    $query=$obj->select_data($tbl_name,$where);
    $res=$obj->execute_query($conn,$query);
    if($res)
    {
        $count=$obj->count_rows($res);
        if($count==1)
        {
            $row=$obj->fetch_data($res);
            $full_name=$row['full_name'];
            $post=$row['post'];
            $email=$row['email'];
            $contact=$row['contact'];
            $country=$row['country'];
            $address=$row['address'];
            $po_box=$row['po_box'];
            $is_active=$row['is_active'];
        }
    }
?>
<div class="main">
    <h1 class="title">Edit Point of Contact</h1>
    <a href="<?php echo SITEURL; ?>admin/?type=pointofcontact"><h3><button type="button">Back</button></h3></a>
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
            <span class="head">Full Name: </span>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>" required="true" />
        </label>
        <label>
            <span class="head">Post: </span>
            <input type="text" name="post" value="<?php echo $post; ?>" />
        </label>
        <label>
            <span class="head">Email: </span>
            <input type="email" name="email" value="<?php echo $email; ?>" />
        </label>
        <label>
            <span class="head">Contact: </span>
            <input type="text" name="contact" value="<?php echo $contact; ?>" />
        </label>
        <label>
            <span class="head">Country: </span>
            <input type="text" name="country" value="<?php echo $country; ?>" />
        </label>
        <label>
            <span class="head">Address: </span>
            <textarea name="address"><?php echo $address; ?></textarea>
        </label>
        <label>
            <span class="head">P.O. BOX: </span>
            <input type="text" name="po_box" value="<?php echo $po_box; ?>" />
        </label>
        <label>
            <span class="head">Is Active: </span>
            <input <?php if($is_active=="yes"){echo "checked='checked'";} ?> type="radio" name="is_active" value="yes" required="true" /> Yes
            <input <?php if($is_active=="no"){echo "checked='checked'";} ?> type="radio" name="is_active" value="no" required="true" /> No
        </label>
        <label>
            <span class="button">
                <input type="hidden" name="point_of_contact_id" value="<?php echo $point_of_contact_id; ?>" />
                <input type="submit" name="submit" value="SAVE" />
            </span>
        </label>
    </form>
</div>