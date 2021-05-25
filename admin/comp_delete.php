<?php
	include("connection.php");
	$id=$_GET['id'];
	mysqli_query($con, "delete from tbl_company where com_id = $id");
	
	header("location:cp_detail.php");
?>