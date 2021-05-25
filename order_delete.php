<?php
include('connection.php');
//session_start();

if ($_SESSION["user"] != "") {

	$prod_id = $_GET['prod_id'];
	$query = "delete from orderdetails where prod_id='$prod_id'";
	$res = mysqli_query($con, $query);

	header("location:account.php");
} else {
	header("location:first.php");
}
