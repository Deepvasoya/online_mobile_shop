<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Company | Mobilehop</title>
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
				<div class="container my-5">
					<a href="cp_detail.php" class="btn btn-primary btn-sm my-auto active" role="button">Back</a>
				</div>

				<div class="container my-5" style="min-height: 550px;">
					<div class="row">
						<div class="col-sm-9 col-md-7 col-lg-5 mx-auto bg-primary">
							<div class="card card-signin my-5">
								<h2 class="text-center my-3"><b>Company</b></h2>
								<div class="col-sm-10 col-sm-offset-1 my-3">
									<div class="login-form">
										<!--login form-->

										<?php
										if (isset($_POST['btnSubmit'])) {

											$CompName = $_POST['txtCompName'];

											if (empty($CompName)) {
												echo "Enter the All Fields.";
											} else {
												mysqli_query($con, "insert into tbl_company (company) values ('$CompName')");
												//header("location:comp_detail.php"); 
											}
										}
										?>
										<form action="#" method="post">

											<input class="mx-5" type="text" placeholder="Company Name" name="txtCompName" id="CompName" value="<?php if (isset($CompName)) echo $CompName; ?>" />

											<button type="submit" name="btnSubmit" class="btn btn-default mx-5 mb-2">Submit</button><br>

										</form>
									</div>
									<!--/login form-->
								</div>
							</div>
						</div>
					</div>
					<div class="container" style="min-height: 390px;">
					</div>
				</div>
			</div>
		</div>
	</div>



	<!--Footer-->

	<?php
	include "footer.php";
	?>
	<!--/Footer-->


	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>