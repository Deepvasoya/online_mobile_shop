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
		<title>Cart| Mobile Shop</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/quenty.js"></script>

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
						$qry = "select * from tbl_product where prod_id ='$_GET[prod_id]' ";
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
							?>
								<tr style="font-size: 18px;">
									<td><?php echo $in; ?></td>
									<td><img src="admin/mobileimage/<?php echo $cart[$i]->image; ?>" alt="" title="" width="70" height="100" border="0" class="cart_thumb" /></td>
									<td><?php echo $cart[$i]->prod_name; ?></td>
									<td>Rs.<?php echo $cart[$i]->price; ?></td>
									<td><input type="text" value="<?php echo $cart[$i]->quantity; ?>" style="width:30px" name="quantity[]" /></td>
									<td class="cart_total_price">Rs.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
									<td class="cart_delete"><a class="btn btn-danger cart_quantity_delete" href="cart.php?index=<?php echo $index; ?>"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							<?php
								$index++;
								$in++;
							}
							?>

							<tr>
								<td colspan="4" align="right" style="color:blue"><b>NOTE:-</b>Press update for updating quantity..</td>
								<td><input type="image" src="images/home/green-update-button-md.png" width="40" height="30"><input type="hidden" name="update"></td>
							</tr>
							<tr style="font-size: 20px; color:red;">
								<td colspan="5" align="right" class="cart_total_price">Total:-</td>
								<td class="cart_total_price">Rs.<?php echo $s; ?></td>
							</tr>
							<tr>
								<td>
									<a href="_index.php" class="btn btn-primary">Continue Shopping</a>
								</td>
								<td colspan='5' align='right'>
									<a href='checkout.php' class='btn btn-primary'>Checkout</a>
								</td>
							</tr>

						</table>
					</form>

				</div>
			</div>
		</section>
		<!--/#cart_items-->




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