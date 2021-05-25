<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}
$q = "select * from tbl_register";
$r = mysqli_query($con, $q);
$count = mysqli_num_rows($r);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | Mobilehop</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			// change user status
			$('.user-status').click(function(e) {
				e.preventDefault();
				var id = $(this).attr('data-id');
				var status = $(this).attr('data-status');
				$.ajax({
					url: 'userstatus.php',
					method: 'POST',
					data: {
						cust_id: id,
						status_id: status
					},
					success: function(data) {
						location.reload();
					}
				});
			});

		});
	</script>
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
			<div class="col-8">
				<div class="container text-center bg-light my-5">
					<h1>Users Details</h1>
					<table class="table my-5">
						<thead>
							<tr class="bg-primary">
								<th scope="col">Customer ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">User Name</th>
								<th scope="col">Email Address</th>
								<th scope="col">Gender</th>
								<th scope="col">Country</th>
								<th scope="col">State</th>
								<th scope="col">City</th>
								<th scope="col">Zip Code</th>
								<th scope="col">Mobile No</th>
								<th scope="col-2">Perform</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($r)) {
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['first_name']; ?></td>
									<td><?php echo $row['last_name']; ?></td>
									<td><?php echo $row['user_name']; ?></td>
									<td><?php echo $row['email_add']; ?></td>
									<td><?php echo $row['gender']; ?></td>
									<td><?php echo $row['country']; ?></td>
									<td><?php echo $row['state']; ?></td>
									<td><?php echo $row['city']; ?></td>
									<td><?php echo $row['zip_code']; ?></td>
									<td><?php echo $row['phone_no']; ?></td>
									<td>
										<div class="d-sm-inline-flex">
											<?php
											if ($row['status'] == '1') { ?>
												<a href="" style="color: red;" class=" btn btn-light btn-sm my-auto active user-status" role="button" data-id="<?php echo $row['cust_id']; ?>" data-status="<?php echo $row['status'] ?>">Block</a>
											<?php } else { ?>
												<a href="" style="color: red;" class=" btn btn-light btn-sm my-auto active user-status" role="button" data-id="<?php echo $row['cust_id']; ?>" data-status="<?php echo $row['status'] ?>">Unblock</a>
											<?php   } ?>

											<a href="register_delete.php?id=<?php echo $row[0]; ?>" class="mx-2 btn btn-danger btn-sm my-auto active" role="button">Delete</a>
										</div>
									</td>

								</tr>

							<?php
								$i++;
							}
							?>

						</tbody>
					</table>

					<table class="table bg-light">
						<tr>
							<td class="text-danger font-weight-bold">Total Register:-<?php echo $count ?> </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>




	<div class="container" style="min-height: 350px;">
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