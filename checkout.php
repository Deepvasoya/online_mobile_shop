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
		<title>Chekout| Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/check.css" rel="stylesheet">
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

	<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">

		<!-- header -->
		<?php include '_nav.php' ?>

		<section id="cart_items" class="bg-light container" style="background: linear-gradient(to right, #9790d8, #33cabb) fixed; margin-top: 100px;  margin-bottom: 100px;">
			<div class="container bg-light">
				<div class="table-responsive cart_info">
					<?php

					if (isset($_GET['prod_id']) && !isset($_POST['update'])) {
						$qry = "select * from tbl_product where prod_id ='$_GET[prod_id]";
						$result = mysqli_query($con, $qry);
						$tbl_product = mysqli_fetch_object($result);
						$item = new Item();
						$item->prod_id = $tbl_product->prod_id;
						$item->image = $tbl_product->image;
						$item->prod_name = $tbl_product->prod_name;
						$item->price = $tbl_product->price;
						$item->quantity = 1;
						//check product is existing in cart
						$index = -1;
						$cart = unserialize(serialize($_SESSION['cart']));
						for ($i = 0; $i < is_countable($cart); $i++)
							if ($cart[$i]->prod_id == $_GET['prod_id']) {
								$index = $i;
								break;
							}
						if ($index == -1)
							$_SESSION['cart'][] = $item;
						else {
							$cart[$index]->quantity++;
							$_SESSION['cart'] = $cart;

							echo $_SESSION['cart'];
						}
					}
					//delete product in cart
					if (isset($_GET['index']) && !isset($_POST['update'])) {
						$cart = unserialize(serialize($_SESSION['cart']));
						unset($cart[$_GET['index']]);
						$cart = array_values($cart);
						$_SESSION['cart'] = $cart;
					}
					//updating quantity in cart
					if (isset($_POST['update'])) {
						$arrQuantity = $_POST['quantity'];
						//check validate quantity
						$valid = 1;
						for ($i = 0; $i < is_countable($arrQuantity); $i++)
							if (!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1) {
								$valid = 0;
								break;
							}
						if ($valid == 1) {
							$cart = unserialize(serialize($_SESSION['cart']));
							for ($i = 0; $i < is_countable($cart); $i++) {
								$cart[$i]->quantity = $arrQuantity[$i];
							}
							$_SESSION['cart'] = $cart;
						} else

							$error = 'Quantity is invalid';
					}
					?>
					<?php echo isset($error) ? $error : ''; ?>
					<form method="post">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu bg-primary" style="font-size: 20px;">
									<td>ID </td>
									<td class="image">Item</td>
									<td>Name</td>
									<td class="price">Price</td>
									<td class="quantity">Quantity </td>
									<td class="total">Total</td>
									<td></td>
								</tr>
							</thead>
							<?php
							$cart = unserialize(serialize($_SESSION['cart']));
							$s = 0;
							$index = 0;
							$in = 1;
							for ($i = 0; $i < is_countable($cart); $i++) {
								$s += $cart[$i]->price * $cart[$i]->quantity;
								$index = $i;
								$did = $cart[$i]->prod_id;
								$qnt = $cart[$i]->quantity;
							?>
								<tr style="font-size: 18px;">
									<td><?php echo $in; ?></td>
									<td><img src="admin/mobileimage/<?php echo $cart[$i]->image; ?>" alt="" title="" width="70" height="100" border="0" class="cart_thumb" /></td>
									<td><?php echo $cart[$i]->prod_name; ?></td>
									<td>Rs.<?php echo $cart[$i]->price; ?></td>
									<td><?php echo $cart[$i]->quantity; ?></td>
									<td class="cart_total_price">Rs.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>

								</tr>
							<?php
								$index++;
								$in++;
							}
							?>
							<tr>
								<td>
									<a href="cart.php" class="btn btn-primary check_out">Back to cart</a>
								</td>

							</tr>

						</table>
					</form>
				</div>
			</div>

			<?php

			if ($s == 0) {
			} else {


			?>

				<div class="container bg-light my-5">
					<table class="table" style="font-size: 20px; font-weight: bold;">
						<tbody>
							<tr>
								<th scope="col">Price</th>
								<td>Rs.<?php echo $s; ?></td>
							</tr>
							<tr>
								<th scope="row">Tax</th>
								<td>Rs.0</td>
							</tr>
							<tr>
								<th scope="row">Delivery</th>
								<td>Rs.100</td>
							</tr>
							<?php
							if ($s == 0) {
								$total = 0;
							} else {
								$total = $s + 100;
							}
							?>
							<tr>
								<th scope="row" class="text-success">Total Amount</th>
								<td class="text-success">Rs.<?php echo $total; ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="container bg-light my-5">
					<div class="shopper-informations my-5 mb-5">
						<div class="row">
							<form name="order" method="post" action="order.php" style="font-size: 15px;">
								<div class="col-sm-3">

								</div>
								<div class="col-sm-5 clearfix">
									<div class="bill-to">
										<p style="color:black;">Bill To</p>

										<div class="form-one">
											<?php
											include "connection.php";
											$custid = $_SESSION['id'];

											$query = "SELECT * FROM `address` WHERE cid = '$custid'";
											$res = mysqli_query($con, $query);
											$row = mysqli_fetch_array($res);

											?>

											<input required type="text" name="txtFName" value="<?php echo $row['fname'] ?>" id="txtFName" placeholder="First Name *" onkeyup="copyto2(this.id);" />

											<input required type="text" name="txtLName" value="<?php echo $row['lname'] ?>" id="txtLName" placeholder="Last Name *" onkeyup="copyto2(this.id);">

											<input required type="text" name="txtAdd" value="<?php echo $row['address'] ?>" id="txtAdd" placeholder="address*" onkeyup="copyto2(this.id);">

											<input required type="text" name="txtZip" value="<?php echo $row['zipcode'] ?>" id="txtZip" placeholder="Zip / Postal Code *" onkeyup="copyto2(this.id);">

											<input required type="text" name="txtCountry" value="<?php echo $row['country']; ?>" id="txtCountry" placeholder="Country *" onkeyup="copyto2(this.id);" />

											<input required type="text" name="txtState" value="<?php echo $row['state']; ?>" id="txtState" placeholder="State *" onkeyup="copyto2(this.id);" />

											<input required type="text" name="txtCity" value="<?php echo $row['city']; ?>" id="txtcity" placeholder="City *" onkeyup="copyto2(this.id);" />

											<input required type="text" name="txtPhno" value="<?php echo $row['phone'] ?>" id="txtPhno" placeholder="Mobile Phone" onkeyup="copyto2(this.id);" maxlength="10">
										</div>
										<div class="form-one mb-5">
											<div style="color: crimson;" class="bill-to1"><input type="checkbox" name="same" id="same" onclick="copyall()" />
												Shipping address same as billing<p style="color:black;">Shipping Address</p>
											</div>

											<input required type="text" name="PtxtFName" value="<?php echo $row['fname'] ?>" id="PtxtFName" placeholder="First Name *" />

											<input required type="text" name="PtxtLName" value="<?php echo $row['lname'] ?>" id="PtxtLName" placeholder="Last Name *">

											<input required type="text" name="PtxtAdd" value="<?php echo $row['address'] ?>" id="PtxtAdd" placeholder="Address*">

											<input required type="text" name="PtxtZip" value="<?php echo $row['zipcode'] ?>" id="PtxtZip" placeholder="Zip / Postal Code *">

											<input required type="text" name="PtxtCountry" value="<?php echo $row['country']; ?>" id="PtxtCountry" placeholder="Country *" />

											<input required type="text" name="PtxtState" value="<?php echo $row['state']; ?>" id="PtxtState" placeholder="State *" />

											<input required type="text" name="PtxtCity" value="<?php echo $row['city']; ?>" id="PtxtCity" placeholder="City *" />

											<input required type="text" name="PtxtPhno" value="<?php echo $row['phone'] ?>" id="PtxtPhno" placeholder="Mobile Phone" maxlength="10">

										</div>
									</div>
									<input type="hidden" name="product_id" value="<?php echo $did; ?>">
									<input type="hidden" name="product_total" value="<?php echo $total; ?>">
									<input type="hidden" name="product_qty" value="<?php echo $qnt; ?>">
									<div>
										<span>
											<a href="order.php"><input type="submit" name="btnSave" style="margin-right: 392px;" class="btn btn-primary pull-right" value="Buynow" /></a>
											<br><br>
										</span>
									</div>
							</form>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</section>

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