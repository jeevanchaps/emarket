<?php //session_start();
include('../includes/apply.php'); 
$new=$obj->uniqid();
$real=substr($new, 0, 8);
$password=md5($real);
$tbl_name="gtt_04_dtbl_general";
$where="general_id='1'";
$query=$obj->select_data($tbl_name,$where);
$res=$obj->execute_query($conn,$query);
$row=$obj->fetch_data($res);
$email=$row['email'];
$full_name=$row['owner'];
$username=$row['username'];
$data="password='$password'";
$query2=$obj->update_data($tbl_name,$data,$where);
$res2=$obj->execute_query($conn,$query2);
if($res2)
{
    $to= $email;
    $subject="Password Change Notification";
    $from='vijaythapa333@gmail.com';
    $message="Dear $full_name,<br />This is an automatic message for password change of your website from the developer 
            of this website. Your login credentials are as followl:<br />
            <b>Username:</b> $username<br />
            <b>Password:</b> $real";
    $send_mail=mail($to,$subject,$message,$from);
    if($send_mail)
    {
        $_SESSION['forgot']="Email with your new password has been sent to your email. Please Check your email and login.";
        header('Location:'.SITEURL.'admin/login.php');
    }
    else
    {
        $_SESSION['forgot']="Message failed to sent.";
        header('Location:'.SITEURL.'admin/login.php');
    }
}
?>