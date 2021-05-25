<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:index.php");
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
	<style>
		.detail-box {
			color: #fff;
			background-color: #346DB9;
			width: 220px;
			padding: 40px 20px;
			border-radius: 5px;
			text-align: center;
			margin: 0 auto 50px;
			border: 5px solid #fff;
			box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.1);
		}

		.detail-box .count {
			display: block;
			font-size: 45px;
			font-weight: 600;
			line-height: 40px;
			margin: 0 0 7px;
		}

		.detail-box .count-tag {
			font-size: 16px;
			text-transform: uppercase;
			font-weight: 600;
		}
	</style>
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
				<div class="container text-center bg-warning my-5">
					<h1>WELCOME TO ADMIN PANEL!</h1>
				</div>

				<div class="container col-12 text-center bg-light my-5">
					<h1>Dashboard</h1>
					<div class="row my-5">
						<div class="col-md-4">
							<div class="detail-box">
								<?php

								$bq = mysqli_query($con, "SELECT COUNT(company) FROM tbl_company");
								$row = mysqli_fetch_assoc($bq);
								$b = $row['COUNT(company)'];

								?>
								<span class="count"><?php echo $b; ?></span>
								<span class="count-tag">BRANDS</span>
							</div>
						</div>
						<div class="col-md-4">
							<?php

							$pq = mysqli_query($con, "SELECT COUNT(prod_id) FROM tbl_product");
							$row = mysqli_fetch_assoc($pq);
							$p = $row['COUNT(prod_id)'];

							?>
							<div class="detail-box">
								<span class="count"><?php echo $p; ?></span>
								<span class="count-tag">PRODUCTS</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="detail-box">
								<?php

								$oq = mysqli_query($con, "SELECT COUNT(cust_id) FROM tbl_register");
								$row = mysqli_fetch_assoc($oq);
								$o = $row['COUNT(cust_id)'];

								?>
								<span class="count"><?php echo $o; ?></span>
								<span class="count-tag">USERS</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="detail-box">
								<?php

								$uq = mysqli_query($con, "SELECT COUNT(id) FROM tbl_order");
								$row = mysqli_fetch_assoc($uq);
								$u = $row['COUNT(id)'];

								?>
								<span class="count"><?php echo $u; ?></span>
								<span class="count-tag">ORDERS</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="detail-box">
								<?php



								$ro = mysqli_query($con, "SELECT COUNT(`cid`) FROM returnorder");
								$now = mysqli_fetch_assoc($ro);
								$ron = $now['COUNT(`cid`)'];

								?>
								<span class="count"><?php echo $ron; ?></span>
								<span class="count-tag">RETURN ORDER</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="detail-box">
								<?php

								$fq = mysqli_query($con, "SELECT COUNT(feed_id) FROM tbl_feedback");
								$row = mysqli_fetch_assoc($fq);
								$f = $row['COUNT(feed_id)'];

								?>
								<span class="count"><?php echo $f; ?></span>
								<span class="count-tag">FEEDBACK</span>
							</div>
						</div>
					</div>
				</div>
				<div class="container" style="min-height: 90px;">
				</div>
			</div>
		</div>
	</div>


	<?php
	include "footer.php";
	?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>