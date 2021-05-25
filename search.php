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
		<title>Search | Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
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

	<body>
		<header id="header">
			<!--header-->
			<div class="header_top" style="background: black">
				<!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a style="color: white"><i class="fa fa-phone"></i> +91 9876543210</a></li>
									<li><a style="color: white"><i class="fa fa-envelope"></i>info@mshop.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header_top-->

			<div class="header-middle">
				<!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									<li>
										<?php

										if ($_SESSION['id'] == "") {
											echo "<a href='login.php'><i class='fa fa-user'></i>Account</a>";
										} else {
											echo "<a href='account.php'><i class='fa fa-user'></i>Account</a>";
										}
										?>
									</li>
									<li>
										<?php

										if ($_SESSION['id'] == "") {
											echo "<a href='login.php'><i class='fa fa-crosshairs'></i>Checkout</a>";
										} else {
											echo "<a href='checkout.php'><i class='fa fa-crosshairs'></i>Checkout</a>";
										}
										?>
									</li>
									<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
										</a></li>
									<li>
										<?php

										if ($_SESSION['id'] == "") {
											echo "<a href='login.php'><i class='fa fa-lock'></i>Login/SignUp</a>";
										} else {
											echo "<a href='logout.php'><i class='fa fa-unlock'></i> Logout</a>";
										}
										?>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="logo pull-left">
								<a href="index.php"><img src="images/home/MobileShopping-logo.png" height="80" width="300" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header-middle-->

			<div class="header-bottom">
				<!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="index.php" class="active"><b>Home</b></a></li>
									<li><a href="about-us.php"><b>About us</b></a>
									</li>
									<li class="dropdown"><a href="#"><b>Search By Brands</b><i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<table>
												<tr>
													<?php

													$result = mysqli_query("select com_id,company from tbl_company", $con);
													while ($row = mysqli_fetch_array($result)) {
														$_SESSION['com_id'] = $data['com_id'];
														echo "<li>";
														echo "<a href='company.php?company=" . $row['com_id'] . "'><span class='pull-right'></span>" . $row['company'], "</a>";
														echo "</li>";
													}
													?>
												</tr>
											</table>
										</ul>
									</li>
									<li><a href="contact-us.php"><b>Contact Us</b></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="search_box pull-right">
								<form method="GET" class="searchform" action="search.php">
									<fieldset>
										<input type="text" name="search" id="search" placeholder="Search" />
										<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header-bottom-->
		</header>
		<!--/header-->



		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">


							<div class="brands_products">
								<!--brands_products-->
								<h2>Brands</h2>
								<div class="brands-name">
									<ul class="nav nav-pills nav-stacked">

										<?php

										$result = mysqli_query("select company from tbl_company", $con);
										while ($row = mysqli_fetch_array($result)) {
											$_SESSION['com_id'] = $data['com_id'];
											echo "<li>";
											echo "<a href='company.php?company=" . $row['company'] . "&'><span class='pull-right'></span>" . $row['company'], "</a>";
											echo "</li>";
										}
										?>
									</ul>
								</div>
							</div>
							<!--/brands_products-->
						</div>
					</div>

					<div class="col-sm-9 padding-right">
						<div class="features_items home_feature">
							<!--features_items-->
							<h2 class="title text-center">Search Items</h2>
							<?php

							$search = $_GET['search'];
							$query = "select *from tbl_product where prod_name like '%$search%'";
							$r = mysqli_query($con, $query);
							if ($search == "") {
								echo "No search found";
							} else

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
												<a href="proddetail.php?prod_id=<?php echo $row['prod_id'] ?>" class=" btn btn-default view1">View Details</a>
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
		</section>

		<?php require("footer.html"); ?>
		<!-- footer -->


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html <?php
		} else {
			header("location:login.php");
		}

			?>