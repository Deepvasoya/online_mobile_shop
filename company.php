<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Company| Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<!--/head-->

	<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">

		<!-- header -->
		<?php include '_nav.php' ?>

		<div class="container my-5">
			<div class="container">
				<div class="row">
					<div class="col-sm-2 mx-5 bg-light">
						<div class="left-sidebar">
							<div class="brands_products">
								<!--brands_products-->
								<h2 class="text-center bg-primary">BRANDS</h2>
								<div class="my-5">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item">
											<ul>
												<?php

												$result = mysqli_query($con, "select com_id,company from tbl_company");
												while ($row = mysqli_fetch_array($result)) {
													$_SESSION['com_id'] = $row['com_id'];
													// echo "<li>";
													echo "<a style='font-size: 15px;' class='dropdown-item' href='company.php?company=" . $row['com_id'] . "'><i class='fa fa-mobile' aria-hidden='true'></i>   <span class='pull-right'></span>" . $row['company'], "</a>";
													// echo "</li>";
												}
												?>
											</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-9 bg-light">
						<div class="features_items home_feature">
							<!--features_items-->
							<h2 class="text-center bg-primary">ITEMS</h2>
							<div id="product_loading" class="my-5">
								<?php
								$com_id = $_REQUEST['company'];
								$sql = "select * from tbl_product WHERE com_id = '$com_id'";
								//echo $sql;
								$r = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_array($r)) {
									$ProdId = $row['prod_id'];
									$ComId = $row['com_id'];

								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">

													<?php// simage($row['image']) ?>
													<img class="home_img" src="admin/mobileimage/<?php echo $row['image']; ?>" height="300px" width="197px" /><br><br>
													<h2 class="price"><?php echo $row['price'] ?></h2><br>
													<h2 class="pro_name"><?php echo $row['prod_name'] ?></h2>

													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													<br><br><br>
													<a href="proddetail.php?prod_id=<?php echo $row['prod_id'] ?>"><a href="proddetail.php?prod_id=<?php echo $row['prod_id'] ?>" class=" btn btn-default view1">View Details</a>
												</div>

											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Footer-->
		<?php include '_footer.php' ?>


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>


<?php
} else {
	header("location:first.php");
}

?>