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
		<title>Detail| Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<style type="text/css">
			.thumbnails img {
				height: 60px;
				padding: 1px;
				margin: 0 10px 10px 0;
			}

			.thumbnails img:hover {
				border: 4px solid #00ccff;
				cursor: pointer;
			}

			.preview img {
				padding: 1px;
				width: 160px;
				height: 300px
			}
		</style>

		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/lightbox.js" type="text/javascript"></script>

		<link rel="shortcut icon" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
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
													echo "<a style='font-size: 15px;' class='dropdown-item' href='company.php?company=" . $row['com_id'] . "'><i class='fa fa-mobile' aria-hidden='true'></i>     <span class='pull-right'></span>" . $row['company'], "</a>";
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
								$prod_id = $_REQUEST['prod_id'];
								//$com_id=$_row['company'];
								$sql = "select * from tbl_product WHERE prod_id = '$prod_id'";
								//echo $sql;
								$r = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_array($r)) {
									$ProdId = $row['prod_id'];
									$ComId = $row['com_id'];

								?>
									<div class="col-sm-9 padding-right">
										<div class="product-details">
											<!--product-details-->
											<div class="col-sm-5">
												<div class="preview">
													<img name="preview" src="admin/mobileimage/<?php echo $row['image']; ?>" alt="" />
												</div>
												<div class="thumbnails">
													<img onmouseover="preview.src=img.src" name="img" src="admin/mobileimage/<?php echo $row['image']; ?>" alt="" />
													<img onmouseover="preview.src=img2.src" name="img2" src="admin/mobileimage/<?php echo $row['image2']; ?>" alt="" />
													<img onmouseover="preview.src=img3.src" name="img3" src="admin/mobileimage/<?php echo $row['image3']; ?>" alt="" />
													<img onmouseover="preview.src=img4.src" name="img4" src="admin/mobileimage/<?php echo $row['image4']; ?>" alt="" />
												</div>

											</div>
											<div class="col-sm-7">
												<div class="product-information">
													<!--/product-information-->

													<h2><?php echo $row['prod_name'] ?></h2>
													<p><?php echo $row['prod_id'] ?></p>
													<img src="images/product-details/rating.png" alt="" />
													<p><?php echo $row['description'] ?>
														<span>
															<span style="font-size: 30px; color:blue"><?php echo $row['price'] ?></span><br>
															<label>Quantity:<?php echo $row['quantity'] ?></label>
															<br><br>
															<a href="cart.php?prod_id=<?php echo $row['prod_id'] ?>" <button type="button" class="btn btn-primary cart"><i class="fa fa-shopping-cart"></i>
																Add to cart
																</button></a><br><br>
															<?php

															if ($_SESSION['id'] == "") //if u are not sign in
															{
																echo "<a href='login.php'><button type='button' class='btn btn-primary' >Buy Now</button></a>";
															} else {
																$qq1 = mysqli_query($con, "select quantity from tbl_product where prod_id=3'$row[prod_id]' ");
																echo ">>>>>>" . $qq1;

																echo "<a href='cart.php?prod_id=$row[prod_id]'><button type='button' class='btn btn-primary' >Buy Now</button></a>";
															}
															?>

														</span>
													<p><b>Availability:</b> In Stock <?php echo ">>>>>>" . $qq1; ?> </p>
													<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
												</div>
												<!--/product-information-->
											</div>
										</div>
										<!--/product-details-->
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<div class="container my-5 text-center">
							<h2>Item Feedback</h2>
						</div>
						<div>
							<?php
							$us = "SELECT * FROM `tbl_feedback`";
							$res = mysqli_query($con, $us);
							while ($row = mysqli_fetch_assoc($res)) {
								$title = $row['subject'];
								$com = $row['desc_feedback'];
								$name = $row['name'];

								echo '<div class="container my-2">
								<div class="row g-0 bg-light position-relative">
									<div class="col-md-1 mb-md-0 p-md-4">
										<img src="images/user.jfif" width="80px" height="80px" class="img-fluid img-thumbnail" alt="...">
									</div>
									<div class="col-md-10 p-4 ps-md-0">
										<a style="text-decoration:none">
											<h4>' . $title . '</h4>
										</a>
										<a style="text-decoration:none">
											<h5 style=" margin-bottom: 20px;">' . $com . '</h5>
										</a>
										<footer class="blockquote-footer">Posted By : <cite title="Source Title">' . $name . '</cite>
											<p>at-2021-02-04 09:45:07</p>
										</footer>
									</div>
								</div>
							</div>';
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Footer-->
		<?php include '_footer.php' ?>
		<!--/Footer-->

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