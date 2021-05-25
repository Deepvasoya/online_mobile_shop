<?php
include('connection.php');
session_start();
if ($_SESSION["user"] != "") {
    $aid = $_GET['aid'];

    $q1 = "DELETE FROM `address` WHERE a_id = $aid";
    mysqli_query($con, $q1);

    header("location:details.php");
} else {
    header("location:first.php");
}
