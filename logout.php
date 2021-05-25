<?php

session_start();

require("connection.php");

$act = "update tbl_register set active=0 where cust_id='$_SESSION[id]' ";
mysqli_query($con, $act);

session_destroy();
header("location:first.php");
exit;
