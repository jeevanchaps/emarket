<?php session_start();
    include('functions.php');
    $obj = new Functions();
    //Connecting Database
    $conn=$obj->db_connect();
    //Selecting Database
    $obj->db_select($conn);
?>