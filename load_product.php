<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {
	if (isset($_POST["price"])) {
		$output = '';
		$query = "select * from tbl_product where price <=" . $_POST['price'] . "";
		$r = mysqli_query($con, $query);
		if (mysqli_num_rows($r) > 0) {
			while ($row = mysqli_fetch_array($r)) {
				$output .= '  
										<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<img class="home_img" src="admin/mobileimage/' . $row["image"] . ' " height="300px" width="197px" /><br><br>
														<h2 class="price">Rs.' . $row["price"] . '</h2><br>
														<h2 class="pro_name"> ' . $row["prod_name"] . '</h2>
														
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														<a href="proddetail.php?prod_id=' . $row["prod_id"] . '"  class=" btn btn-default view1">View Details</a>	 
													</div>
													
											</div>
										</div>
									</div>
									';
			}
		} else {
			$output = "No Product Found";
		}
		echo $output;
	}
} else {
	header("location:login.php");
}
