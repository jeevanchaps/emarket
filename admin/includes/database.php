<?php 
    include('constants.php');
    class Database{
        function db_connect()
        {
            $conn=mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
            return $conn;
        }
        function db_select($conn)
        {
            $db_select=mysqli_select_db($conn,DBNAME) or die(mysqli_error());
            return $db_select;
        }
        function insert_data($tbl_name,$data)
        {
            $query="INSERT INTO $tbl_name SET $data";
            return $query;
        }
        function select_data($tbl_name,$where="")
        {
            $query="SELECT * FROM $tbl_name";
            if($where!="")
            {
                $query.=" WHERE $where";
            }
            return $query;
        }
        function update_data($tbl_name,$data,$where="")
        {
            $query="UPDATE $tbl_name SET $data";
            if($where!="")
            {
                $query.=" WHERE $where";
            }
            return $query;
        }
        function delete_data($tbl_name,$where="")
        {
            $query="DELETE FROM $tbl_name";
            if($where!="")
            {
                $query.=" WHERE $where";
            }
            return $query;
        }
        function execute_query($conn,$query)
        {
            $res=mysqli_query($conn,$query) or die(mysqli_error($conn));
            return $res;
        }
        function count_rows($res)
        {
            $count=mysqli_num_rows($res);
            return $count;
        }
        function fetch_data($res)
        {
            $row=mysqli_fetch_assoc($res);
            return $row;
        }
        function upload_file($source, $destination)
        {
            $upload=move_uploaded_file($source,$destination);
            return $upload;
        }
        function delete_file($path,$file_name)
        {
            $delete=unlink($path/$file_name);
            return $delete;
        }
    }
    
?>