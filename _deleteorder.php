
<?php

include("connection.php");
session_start();

if ($_SESSION["user"] != "") {
    $ordersid = $_GET['ordersid'];

    $q1 = "DELETE FROM `adddeatails` WHERE ordersid = $ordersid";
    mysqli_query($con, $q1);


    $q2 = "DELETE FROM `tbl_order` WHERE id = $ordersid";
    mysqli_query($con, $q2);

    $q3 = "DELETE FROM `orderdetails` WHERE ordersid = $ordersid";
    mysqli_query($con, $q3);

    $q4 = "DELETE FROM `payments` WHERE orderid = $ordersid";
    mysqli_query($con, $q4);



    header("location:_orderdetails.php");
} else {
    header("location:first.php");
}

?> 