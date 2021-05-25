<?php
include('connection.php');
session_start();

$ordersid = $_POST['ordersid'];
$status = $_POST['status'];

$query = "update adddeatails set order_status='$status' where ordersid='$ordersid'";

if ($res1 = mysqli_query($con, $query)) {
	echo 'Order Status Update successfully';
}
