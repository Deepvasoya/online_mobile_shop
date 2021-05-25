<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}
$q = "select * from tbl_feedback";
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
				<div class="container text-center bg-light my-5" style="max-height: 600px;">
					<h1>Feedback Details</h1>
					<table class="table my-5">
						<thead>
							<tr class="bg-primary">
								<th scope="col">Feedback ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Subject</th>
								<th scope="col">Message</th>
								<th scope="col">Perform</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($r)) {
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['email_id']; ?></td>
									<td><?php echo $row['subject']; ?></td>
									<td><?php echo $row['desc_feedback']; ?></td>

									<td><a href="feedback_delete.php?id=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm my-auto active" role="button">Delete</a></td>

								</tr>
							<?php
								$i++;
							}
							?>

						</tbody>
					</table>
					<table class="table bg-light">
						<tr>
							<td class="text-danger font-weight-bold">Total Feedback:-<?php echo $count ?> </td>
						</tr>
					</table>
				</div>

			</div>
		</div>
	</div>




	<div class="container" style="min-height: 450px;">
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