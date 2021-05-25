<?php
	session_start();
	$username=$_POST['txtUsername'];
	$password=$_POST['txtPassword'];
	
	include("connection.php");
	$sql = "select * from tbl_admin";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	$uname=$row['admin_email_id'];
	$pwd=$row['admin_pswd'];
	if($uname==$username && $pwd==$password)
	{
		$_SESSION['id']=$row['admin_id'];
		//echo $_SESSION['id'];
		header("location:HomePage.php");
		
		//echo $uname;
		//echo $pwd;
	}
	else
	{
		//header("location:index.php?res=1");
	}
?>