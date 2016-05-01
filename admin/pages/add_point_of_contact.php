<?php 
    if(isset($_POST['submit']))
    {
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
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res)
        {
            $_SESSION['poc_success']="New Point of Contact successfully added.";
            header('Location:'.SITEURL.'admin/?type=pointofcontact');
        }
        else
        {
            $_SESSION['poc_fail']="Failed to add new Point of Contact. Try again.";
            header('Location:'.SITEURL.'admin?type=addpointofcontact');
        }
    }
?>
<div class="main">
    <h1 class="title">Add Point of Contact</h1>
    <a href="<?php echo SITEURL; ?>admin/?type=pointofcontact"><h3><button type="button">Back</button></h3></a>
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
            <span class="head">Full Name: </span>
            <input type="text" name="full_name" placeholder="Full Name*" required="true" />
        </label>
        <label>
            <span class="head">Post: </span>
            <input type="text" name="posit" placeholder="Post" />
        </label>
        <label>
            <span class="head">Email: </span>
            <input type="email" name="email" placeholder="Email" />
        </label>
        <label>
            <span class="head">Contact: </span>
            <input type="text" name="cntact" placeholder="Contact Number" />
        </label>
        <label>
            <span class="head">Country: </span>
            <input type="text" name="country" placeholder="Country" />
        </label>
        <label>
            <span class="head">Address: </span>
            <textarea name="address" placeholder="Address"></textarea>
        </label>
        <label>
            <span class="head">P.O. BOX: </span>
            <input type="text" name="po_box" placeholder="Postal Address/Zip Address" />
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