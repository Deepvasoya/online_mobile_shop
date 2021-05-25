<?php
	include("connection.php");
	$id=$_GET['id'];
	mysqli_query($con, "delete from tbl_register where cust_id = $id");
	
	header("location:register_detail.php");
?>