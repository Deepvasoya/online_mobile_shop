<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {

	require 'item.php';


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Account | Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script type="text/javascript" src="js/copyform.js"></script>

		<link rel="shortcut icon" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
		<link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
	</head>
	<!--/head-->

	<body>

		<?php require("header.php"); ?>
		<section id="cart_items">
			<div class="container">
				<div class="breadcrumbs">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">My Order</li>
					</ol>
				</div>
				<div class="table-responsive cart_info">

					<form method="post">
						<h2><b>MY Order</b></h2>
						<a href="index.php" class="btn btn-default check_out">BACK</a><br>
						<table class="table table-condensed">
							<tr class="cart_menu">
								<td>Order-id</td>
								<td>Product-id</td>
								<td>Prod-image</td>
								<td class="price">Price</td>
								<td class="quantity">Quantity </td>
								<td class="total">Total</td>
								<td></td>
							</tr>
							<?php
							$cust_id = $_SESSION['id'];
							$q = "select * from tbl_order where cust_id='$cust_id'";
							//echo $q."<br>";
							$r2 = mysqli_query($con, $q);



							while ($row2 = mysqli_fetch_array($r2)) {
								$qq = "select * from orderdetails where ordersid ='" . $row2['id'] . "'";
								$rr = mysqli_query($con, $qq);

								while ($row = mysqli_fetch_array($rr)) {
									$q3 = "select * from tbl_product where prod_id='" . $row['prod_id'] . "'";
									$r3 = mysqli_query($con, $q3);
									//echo $q3;
									$q4 = "select * from adddeatails where ordersid ='" . $row2['id'] . "' ";
									$r4 = mysqli_query($con, $q4);
									//echo $q4;
									while ($row3 = mysqli_fetch_array($r3)) {
										$row4 = mysqli_fetch_array($r4);
										echo "<tr>
							<td>$row2[id]</td>
							<td>$row[prod_id]</td>
							<td><img src='admin/mobileimage/$row3[image]' width='70' height='100'></td>
							<td>Rs.$row[price]</td>
							<td>$row[quantity]</td>
							<td>Rs.$row[price]</td>
							<td>
									<a href='order_delete.php?prod_id=$row[prod_id]&ordersid=$row2[id]' style='color:red'><img src='images/remove.png' width='40px' height='35px'></a>
							</td>
						</tr><br>
						<tr>
							<td style='color:green'> 
								Order-Status:-$row4[order_status]
							</td>
							
						</tr>";
									}
								}
							}
							?>

						</table>
					</form>
				</div>
			</div>


		</section>
		<!--/#cart_items-->

		<footer id="footer">
			<!--Footer-->
			<div class="footer-widget">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>About Mobileshop</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Online Help</a></li>
									<li><a href="#">Mobile News</a></li>
									<li><a href="#">Mobile Reviews</a></li>
									<li><a href="#">0% Finance</a></li>
									<li><a href="#">FAQ’s</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Contact Us Information</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Telephone/Email us</a></li>
									<li><a href="#">Login/Register</a></li>
									<li><a href="#">Press</a></li>
									<li><a href="#">Report a bug</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Returns and Policies</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">30 day returns policy</a></li>
									<li><a href="#">Delivery policy</a></li>
									<li><a href="#">Shipping locations</a></li>
									<li><a href="#">Click & Collect</a></li>
									<li><a href="#">Bulk purchases</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Other Information</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Company Information</a></li>
									<li><a href="#">Bracelet adjustments</a></li>
									<li><a href="#">Competition</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<div class="single-widget">
								<h2>About Mobileshop</h2>
								<form action="#" class="searchform">
									<input type="text" placeholder="Your email address" />
									<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
									<p>Get the most recent updates from <br />our site and be updated your self...</p>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<p class="pull-left">MOBLIESHOP™ is a trademark of MOBILE Shop Ltd © 2007 - 2015 All rights reserved<br>
							MOBILEShop.com is the INDIA's No. 1 visited watch website.</p>
					</div>
				</div>
			</div </footer>
			<!--/Footer-->




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