<?php
include('connection.php');
session_start();
if (isset($_POST['status_id'])) {
    $id = $_POST['cust_id'];
    $status_id = $_POST['status_id'];

    if ($status_id == '1') {
        $query = "update tbl_register set status='0' where cust_id='$id'";
        if ($res1 = mysqli_query($con, $query)) {
            echo 'User Status Update successfully';
        }
    } else {
        $query = "update tbl_register set status='1' where cust_id='$id'";
        if ($res1 = mysqli_query($con, $query)) {
            echo 'User Status Update successfully';
        }
    }
}
