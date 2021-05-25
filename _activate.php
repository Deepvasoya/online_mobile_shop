<?php
include("connection.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "UPDATE `tbl_register` SET `verification`='done' WHERE token='$token'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location: first.php");
    }
}
