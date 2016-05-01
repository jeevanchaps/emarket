<?php 
    include('database.php');
    class Functions extends Database{
        function sanitize($data){
            $clean=stripslashes(mysql_real_escape_string($data));
            return $clean;
        }
        function uniqid()
        {
            $uniq= md5(uniqid(rand(0000,9999),TRUE));
            return $uniq;
        }
        function login($conn,$tbl_name,$where="")
        {
            $query="SELECT * FROM $tbl_name";
            if($where!="")
            {
                $query.=" WHERE $where";
            }
            $res=mysqli_query($conn,$query) or die(mysqli_error());
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        function logout()
        {
            $logout=session_destroy();
            return $logout;
        }
    }
?>