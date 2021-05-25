<script>
	function update_status(id) {
		var id = id;
		var ordersid = $('#hdns_' + id).val();
		var status = $('#status_' + id).val();

		$.ajax({
			type: "POST",
			url: "status.php",
			data: {
				"ordersid": ordersid,
				"status": status
			},
			dataType: "text",
			success: function(data) {
				alert(data);
			}
		});

	}
</script>


<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}
$ordersid = $_REQUEST['ordersid'];
$q = "select * from adddeatails where ordersid = '$ordersid'";
$r = mysqli_query($con, $q);
//echo $q;

$q2 = "select * from orderdetails where ordersid = '$ordersid'";
$r2 = mysqli_query($con, $q2);
//echo $q2;

$cust_id = $_REQUEST['cust_id'];
$q3 = "select * from tbl_order where id = '$ordersid' AND cust_id='$cust_id'";
$r3 = mysqli_query($con, $q3);
//echo $q3;


$q4 = "select * from tbl_register where cust_id='$cust_id'";
$r4 = mysqli_query($con, $q4);

$q7 = "select * from payments where orderid='$ordersid'";
$r7 = mysqli_query($con, $q7);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | Mobilehop</title>
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
			<div class="col-8" style="min-height: 900px;">
				<div class="container my-5">
					<a href="_order.php" class="btn btn-primary btn-sm my-auto active" role="button">BACK</a>
				</div>

				<div class="container text-center bg-primary my-5">
					<h1>Order Details</h1>
				</div>

				<div class="container bg-light">
					<div class="row">
						<div class="col-sm-12 col-sm-offset-1">
							<div class="login-form" id="order">
								<form action="" method="post">
									<table class="table" align="left" width="800px">
										<tr style="background-color:#158C82;color:white">
											<th>User details</th>
											<th>Bill Address</th>
											<th>Shipping Address</th>
										</tr>
										<?php
										while ($row4 = mysqli_fetch_array($r4)) {
											$row3 = mysqli_fetch_array($r3);
											$row = mysqli_fetch_array($r);
											$sta = $row['order_status'];


										?>
											<tr>
												<td><label>Order On:-</label><?php echo $row['date'] ?></td>
												<td><label>Address:-</label><?php echo $row['address'] ?></td>
												<td><label>Address:-</label><?php echo $row['paddress'] ?></td>
											</tr>
											<tr>
												<td><label>Name:-</label><?php echo $row4['first_name'] . " " . $row4["last_name"] ?></td>
												<td><label>Phone No:-</label><?php echo $row['phoneno'] ?></td>
												<td><label>Phone No:-</label><?php echo $row['pphoneno'] ?></td>
											</tr>
											<tr>
												<td><label>Email id:-</label><?php echo $row4['email_add'] ?></td>
												<td><label>Country:-</label><?php echo $row['country'] ?></td>
												<td><label>Country:-</label><?php echo $row['pcountry'] ?></td>
											</tr>
											<tr>
												<td><label>Phone No:-</label><?php echo $row4['phone_no'] ?></td>
												<td><label>State:-</label><?php echo $row['state'] ?></td>
												<td><label>State:-</label><?php echo $row['pstate'] ?></td>
											</tr>
											<tr>
												<td><label>Gender:-</label><?php echo $row4['gender'] ?></td>
												<td><label>City:-</label><?php echo $row['city'] ?></td>
												<td><label>City:-</label><?php echo $row['pcity'] ?></td>
											</tr>
										<?php
										}
										?>
									</table>
									<table class="table">
										<tr>
											<th style="background-color:#158C82;color:white">Product-Deatails</th>
										</tr>
									</table>
									<table class="table">

										<tr>
											<th>Product-id</th>
											<th>Payment Status</th>
											<th>price</th>
											<th>Quantity</th>
											<th>Status</th>
										</tr>
										<?php


										while ($row2 = mysqli_fetch_array($r2)) {

											$q5 = "select * from tbl_status where prod_id='" . $row2['prod_id'] . "' AND cust_id='$cust_id'";
											$r5 = mysqli_query($con, $q5);
											//echo $q5;
											$row5 = mysqli_fetch_array($r5);
											$row7 = mysqli_fetch_array($r7);
										?>
											<tr>

												<td>
													<input type="hidden" id="hdns_<?php echo $row2['prod_id'] ?>" name="hdns_<?php echo $row2['prod_id'] ?>" value="<?php echo $row2['ordersid'] ?>" />
													<input type="hidden" name="prod_id_<?php echo $row2['prod_id'] ?>" id="prod_id_<?php echo $row2['prod_id'] ?>" value="<?php echo $row2['prod_id'] ?>"><?php echo $row2['prod_id'] ?>
												</td>
												<td><?php echo "Paid" ?></td>
												<td><?php echo $row7['payment_gross'] ?></td>
												<td><?php echo $row7['product_qty'] ?></td>
												<td><select name="status_<?php echo $row2['prod_id'] ?>" id="status_<?php echo $row2['prod_id'] ?>" value="<?php if (isset($_POST['status'])) {
																																								echo $_POST['status'];
																																							} ?>">
														<option name="NEW" value="NEW">NEW</option>
														<option name="APPROVAL" value="APPROVAL">APPROVAL</option>
														<option name="PROGRESS" value="PROGRESS">PROGRESS</option>
														<option name="SHIPPED" value="SHIPPED">SHIPPED</option>
														<option name="DELIVARY" value="DELIVARY">DELIVARY</option>
														<option name="COMPLETED" value="COMPLETED">COMPLETED</option>
													</select> </td>
												<td>
													<input type="button" onclick="update_status(<?php echo $row2['prod_id']; ?>);" value="Submit" class="btn btn-primary text-light bg-primary check_out" name="submit" id="submit" style="width:60px" />
												</td>

											</tr>


										<?php
										}
										?>

									</table>
								</form>


							</div>
							<!--/login form-->
							<form>
								<input type="button" name="print" value="Print" class="btn btn-primary check_out" onClick="printContent('order')">
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



	<div class="container"></div>
	<?php
	include "footer.php";
	?>

	<script>
		function printContent(order) {
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(order).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>

	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>