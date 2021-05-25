<?php
include('connection.php');
session_start();

$ordersid = $_POST['ordersid'];
$status = $_POST['status'];

$query = "UPDATE `returnorder` SET `status`= '$status' WHERE `oid` = '$ordersid'";

if ($res1 = mysqli_query($con, $query)) {
    echo 'Return Order Status Update successfully';
}
