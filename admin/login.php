<?php include('includes/apply.php'); ?>
<?php ob_start(); ?>
<?php include('box/header.php'); ?>
<?php if(isset($_POST['submit']))
    {
        $username=$obj->sanitize($_POST['username']);
        $password=md5($obj->sanitize($_POST['password']));
        $tbl_name="gtt_04_dtbl_general";
        $where="username='$username' && password='$password'";
        $login=$obj->login($conn,$tbl_name,$where);
        if($login)
        {
            $_SESSION['username']=$username;
            header('Location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['login']="Username or Password or Both Incorrect. Please Try Again.";
            header('Location:'.SITEURL.'admin/login.php');
        }
    }
    
?>
        <div class="wrapper">
            <div class="login">
                <h2>LOGIN</h2>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        //unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['forgot']))
                    {
                        echo $_SESSION['forgot'];
                        unset($_SESSION['forgot']);
                    }
                ?>
                <form method="post" action="">
                    <input type="text" name="username" placeholder="Username" required="true" />
                    <input type="password" name="password" placeholder="Password" required="true" />
                    <input type="submit" name="submit" value="Login" /><br />
                    <a href="<?php echo SITEURL; ?>admin/pages/forgot.php">Forgot Password</a>
                </form>
            </div>
        </div>
<?php include('box/footer.php');
ob_end_flush(); ?>