<?php
$con = mysqli_connect("localhost", "root", "", "mshop");
if (!$con) {
	die("Not Connected" . mysqli_error($con));
}
