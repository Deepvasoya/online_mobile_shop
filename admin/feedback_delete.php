<?php
	include("connection.php");
	$id=$_GET['id'];
	mysqli_query($con, "delete from tbl_feedback where feed_id = $id");
	
	header("location:feedback_detail.php");
?>