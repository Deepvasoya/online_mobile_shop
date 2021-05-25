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
$q = "select * from tbl_product LIMIT {$offset}, {$limit}";
$r = mysqli_query($con, $q);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Product | Mobilehop</title>
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
				<div class="container my-3">
					<a href="product.php" class="btn btn-primary btn-sm my-auto active" role="button">ADD NEW PRODUCT</a>
				</div>



				<div class="container text-center bg-light my-3">
					<h1>Product Details</h1>
					<table class="table my-5">
						<thead>
							<tr class="bg-primary">
								<th scope="col">Product ID</th>
								<th scope="col">Company Name</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product Description</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Main Image</th>
								<th scope="col">Image2</th>
								<th scope="col">Image3</th>
								<th scope="col">Image4</th>
								<th scope="col" colspan=2>Perform</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($r)) {
								$img = $row['image'];
								$img2 = $row['image2'];
								$img3 = $row['image3'];
								$img4 = $row['image4'];
								//echo $img;

							?>
								<tr>
									<td><?php echo $i; ?></td>

									<?php
									$ComId = $row['com_id'];
									$qq = "select company from tbl_company where com_id=$ComId";
									$catres = mysqli_query($con, $qq);
									$catrow = mysqli_fetch_array($catres);
									?>
									<td><?php echo $catrow['company']; ?></td>
									<td><?php echo $row['prod_name']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php
										//function simage($id)
										{
											$file_folder = 'mobileimage/';
											$ProdImg = $file_folder . $img;
											if (file_exists($ProdImg)) {
												$fpath = $ProdImg;
											} else {
												$fpath = "mobileimage/no_preview.jpg";
											}
											//echo $fpath;
											//return;

											echo "<img src='$fpath' height='100' width='100'>";
										}
										?>
									</td>
									<td><?php
										//function simage($id)
										{
											$file_folder = 'mobileimage/';
											$ProdImg2 = $file_folder . $img2;
											if (file_exists($ProdImg2)) {
												$fpath = $ProdImg2;
											} else {
												$fpath = "mobileimage/no_preview.jpg";
											}
											//echo $fpath;
											//return;

											echo "<img src='$fpath' height='100' width='100'>";
										}
										?>
									</td>
									<td><?php
										//function simage($id)
										{
											$file_folder = 'mobileimage/';
											$ProdImg3 = $file_folder . $img3;
											if (file_exists($ProdImg3)) {
												$fpath = $ProdImg3;
											} else {
												$fpath = "mobileimage/no_preview.jpg";
											}
											//echo $fpath;
											//return;

											echo "<img src='$fpath' height='100' width='100'>";
										}
										?>
									</td>
									<td><?php
										//function simage($id)
										{
											$file_folder = 'mobileimage/';
											$ProdImg4 = $file_folder . $img4;
											if (file_exists($ProdImg4)) {
												$fpath = $ProdImg4;
											} else {
												$fpath = "mobileimage/no_preview.jpg";
											}
											//echo $fpath;
											//return;

											echo "<img src='$fpath' height='100' width='100'>";
										}
										?>
									</td>
									<td>
									<td><a href="product_update.php?id=<?php echo $row[0]; ?>" class="btn btn-primary btn-sm my-auto active mx-2" role="button">Update</a><a href="product_delete.php?id=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm my-3 active" role="button">Delete</a></td>
									</td>


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
                    <a class="page-link" href="product_detail.php?page=' . ($page - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
                </li>';
						}
						?>




						<?php

						$sql1 = "select * from tbl_product";
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


								<li class="page-item <?php echo $active; ?>"><a class="page-link" href="product_detail.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

						<?php
							}
						}
						?>

						<?php
						#Next
						if ($total_page > $page) {
							echo '<li class="page-item">
                    <a class="page-link" href="product_detail.php?page=' . ($page + 1) . '">Next</a>
                </li>';
						}
						?>

					</ul>
				</nav>
				<div class="container" style="min-height: 20px;">
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
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>