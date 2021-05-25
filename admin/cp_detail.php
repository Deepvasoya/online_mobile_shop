<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
#set limit
$limit = 4;

#set offset
$offset = ($page - 1) * $limit;
$q = "select * from tbl_company LIMIT {$offset}, {$limit}";
$r = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Company| Mobilehop</title>
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
				<div class="container my-5">
					<a href="comp.php" class="btn btn-primary btn-sm my-auto active" role="button">ADD NEW CATEGORY</a>
				</div>
				<div class="container text-center bg-light my-5">
					<h1>Company Details</h1>
					<table class="table my-5">
						<thead>
							<tr class="bg-primary">
								<th scope="col">Company ID</th>
								<th scope="col">Company Name</th>
								<th scope="col">Perform</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							if ($page == 2) {
								$i = 5;
							}
							while ($row = mysqli_fetch_array($r)) {
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['company']; ?></td>
									<td><a href="comp_update.php?id=<?php echo $row[0]; ?>" class="btn btn-primary btn-sm my-auto active mx-2" role="button">Update</a><a href="comp_delete.php?id=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm my-auto active" role="button">Delete</a></td>
								</tr>
							<?php
								$i++;
							}
							?>

						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">

						<?php
						#Previous
						if ($page > 1) {
							echo ' <li class="page-item">
                    <a class="page-link" href="cp_detail.php?page=' . ($page - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
                </li>';
						}
						?>




						<?php

						$sql1 = "select * from tbl_company";
						$result1 = mysqli_query($con, $sql1);

						if (mysqli_num_rows($result1)  > 0) {

							$total_record = mysqli_num_rows($result1);
							$total_page = ceil($total_record / $limit);

							for ($i = 1; $i <= $total_page; $i++) {

								#for activee page class
								if ($i == $page) {
									$active = "active";
								} else {
									$active = "";
								}

						?>


								<li class="page-item <?php echo $active; ?>"><a class="page-link" href="cp_detail.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

						<?php
							}
						}
						?>

						<?php
						#Next
						if ($total_page > $page) {
							echo '<li class="page-item">
                    <a class="page-link" href="cp_detail.php?page=' . ($page + 1) . '">Next</a>
                </li>';
						}
						?>

					</ul>
				</nav>

				<div class="container" style="min-height: 240px;">
				</div>
			</div>
		</div>
	</div>



	<!--Footer-->

	<?php
	include "footer.php";
	?>
	<!--/Footer-->



	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>