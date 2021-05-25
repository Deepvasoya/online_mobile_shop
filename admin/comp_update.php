<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id'])) {
	header("location:index.php");
	exit();
}
$id = $_GET['id'];
$upd = mysqli_query($con, "select * from tbl_company where com_id=$id");
$rows = mysqli_fetch_array($upd);
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
								<h2 class="text-center my-3"><b>Company Update</b></h2>
								<div class="col-sm-10 col-sm-offset-1 my-3">
									<div class="login-form">
										<!--login form-->

										<?php
										if (isset($_POST['btnUpdate'])) {
											$CompName = $_POST['txtCompName'];
											if (empty($CompName)) {
												echo "Enter the All Fields.";
											} else {
												$sql = "update tbl_company set company= '$CompName' where com_id=$id";
												//echo $sql;
												mysqli_query($con, $sql);

												//header("location:comp_detail.php");
											}
										}
										?>
										<form action="#" method="post">
											<input class="mx-5" type="text" placeholder="Company Name" name="txtCompName" id="CompName" value="<?php echo $rows['company']; ?>" />

											<button type="submit" name="btnUpdate" class="btn btn-default mx-5 mb-2">Update</button><br>
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