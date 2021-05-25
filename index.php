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
		<title>Home | Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/quenty.js"></script>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>



		<link rel="shortcut icon" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
	</head>
	<!--/head-->

	<body>
		<?php require("header.php"); ?>
		<!-- header -->

		<section id="slider">
			<!--slider-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li>
								<li data-target="#slider-carousel" data-slide-to="3"></li>
								<li data-target="#slider-carousel" data-slide-to="4"></li>
							</ol>

							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-6">
										<h1><b><span><big>A</big></span>PPLE</b></h1>
										<h3>IPHONE 12</h3>

									</div>
									<div class="col-sm-6">
										<br><br>
										<img src="images/home/iphone.jpg" width="400px" height="400px" class="slide img-responsive" alt="" />
									</div>
								</div>
								<div class="item">
									<div class="col-sm-6">
										<h1><b><span><big>R</big></span>EALME</b></h1>
										<h3>REALME MOBILE PHONE </h3>


									</div>
									<div class="col-sm-6">
										<br><br>
										<img src="images/home/realme.jpg" width="300px" height="300px" class="slide img-responsive" alt="" />
									</div>
								</div>
								<div class="item">
									<div class="col-sm-6">
										<h1><b><span><big>L</big></span>ENOVO</b></h1>
										<h3>K 900 MODEL</h3>

									</div>
									<div class="col-sm-6">
										<br><br>
										<img src="images/home/slide3.jpg" class="slide img-responsive" alt="" />
									</div>
								</div>
								<div class="item">
									<div class="col-sm-6">
										<h1><b><span><big>S</big></span>AMSUNG</b></h1>
										<h3>SAMSUNG MOBILE PHONE</h3>

									</div>
									<div class="col-sm-6">
										<br><br>
										<img src="images/home/slide4.png" class="slide img-responsive" alt="" />
									</div>
								</div>

								<div class="item">
									<div class="col-sm-6">
										<h1><b><span><big>N</big></span>OKIA</b></h1>
										<h3>MICROSOFT BUILD</h3>

									</div>
									<div class="col-sm-6">
										<br><br><br>
										<img src="images/home/slide5.png" class="slide img-responsive" alt="" />
									</div>
								</div>
							</div>

							<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/slider-->

		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">


							<div class="brands_products">
								<!--brands_products-->
								<h2>Brands</h2>
								<div class="brands-name">
									<ul class="nav nav-pills nav-stacked ">

										<?php

										$result = mysqli_query($con, "select com_id,company from tbl_company;");
										while ($row = mysqli_fetch_array($result)) {
											$_SESSION['com_id'] = $row['com_id'];
											echo "<li>";
											echo "<a href='company.php?company=" . $row['com_id'] . "'><span class='pull-right'></span>" . $row['company'], "</a>";
											echo "</li>";
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-9 padding-right">
						<div class="features_items home_feature">
							<!--features_items-->
							<h2 class="title text-center">Features Items</h2>
							<div id="product_loading">
								<?php

								$sql = "select * from tbl_product";

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
													<h2 class="price">Rs.<?php echo $row['price'] ?></h2><br>
													<h2 class="pro_name"><?php echo $row['prod_name'] ?></h2>
													<a href="cart.php?prod_id=<?php echo $row['prod_id'] ?>" class=" btn btn-default add-to-cart"><i class='fa fa-shopping-cart'></i>Add to cart</a>
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
				</div>
		</section>

		<?php require("footer.html"); ?>
		<!-- footer -->



		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
		<script>
			$(document).ready(function() {
				$('#min_price').change(function() {
					var price = $(this).val();
					$("#price_range").text("Product under Price Rs." + price);
					$.ajax({
						url: "load_product.php",
						method: "POST",
						data: {
							price: price
						},
						success: function(data) {
							$("#product_loading").fadeIn(500).html(data);
						}
					});
				});
			});
		</script>
	</body>

	</html>


<?php

} else {
	header("location:login.php");
}

?>