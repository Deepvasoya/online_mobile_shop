<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Change Password</title>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">
	<?php
	include "nav.php";
	?>
	<div>
		<div class="row">
			<div class="col-3">
				<?php
				include "_sidebar.php";
				?>
			</div>
			<div class="col-8">
				<div class="container my-5" style="min-height: 800px;">
					<div class="row">
						<div class="col-sm-9 col-md-7 col-lg-5 mx-auto bg-primary">
							<div class="card card-signin my-5">
								<h2 class="text-center my-3"><b>Change Password</b></h2>
								<div class="col-sm-10 col-sm-offset-1 my-3">
									<div class="login-form">
										<!--login form-->

										<?php

										include("connection.php");
										if (isset($_POST['btnSubmit'])) {
											$Password = $_POST['txtOldPassword'];
											$NewPassword = $_POST['txtNewPassword'];
											$ConfirmPassword = $_POST['txtConfirmPassword'];


											if (empty($Password) || empty($NewPassword) || empty($ConfirmPassword)) {
												echo "<h4>";
												echo "Filed must be required!";
											} elseif ($NewPassword == $ConfirmPassword) {

												$sql1 = "UPDATE `tbl_admin` SET `admin_pswd` = '$NewPassword' WHERE `tbl_admin`.`admin_id` = 1";

												//echo $sql;
												mysqli_query($con, $sql1);
												#header("location: http://localhost/Project/admin/HomePage.php");
												echo "<h4>";
												echo "Password Change Successfully!";
											} else {
												echo "<h4>";
												echo "Do Not match Password!";
											}
										}
										?>
										<form action="#" method="post">

											<input class="mx-5" type="password" placeholder="Old Password" name="txtOldPassword" id="OldPassword" />
											<input class="mx-5" type="password" placeholder="New Password" name="txtNewPassword" id="NewPassword" />
											<input class="mx-5" type="password" placeholder="Confirm Password" name="txtConfirmPassword" id="ConfirmPassword" />

											<button type="submit" name="btnSubmit" class="btn btn-default mx-5 mb-2">Submit</button>
										</form>
									</div>
									<!--/login form-->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>




		</div>
	</div>
	</div>



	<?php
	include "footer.php";
	?>
	<!--/Footer-->
	<!--/Footer-->


	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>