<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
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
				<div class="container my-5">
					<a href="product_detail.php" class="btn btn-primary btn-sm my-auto active" role="button">Back</a>
				</div>

				<div class="container my-5" style="min-height: 550px;">
					<div class="row">
						<div class="col-sm-9 col-md-7 col-lg-5 mx-auto bg-primary">
							<div class="card card-signin my-5">
								<h2 class="text-center my-3"><b>Product</b></h2>
								<div class="col-sm-10 col-sm-offset-1 my-3">
									<div class="login-form">
										<!--login form-->

										<?php
										if (isset($_POST['btnSubmit'])) {
											$ComId = $_POST['txtCompName'];
											$ProdName = $_POST['txtProdName'];
											$ProdDesc = $_POST['txtProdDesc'];
											$ProdPrice = $_POST['txtProdPrice'];
											$ProdQunt = $_POST['txtProdQunt'];




											#ProdImg
											$ProdImg_name = $_FILES['ProdImg']['name'];
											$ProdImg_type = $_FILES['ProdImg']['type'];
											$ProdImg_tmp_name = $_FILES['ProdImg']['tmp_name'];
											$ProdImg_size = $_FILES['ProdImg']['size'];
											$ProdImg_address = "mobileimage/" . $ProdImg_name;

											$ProdImgext = explode('.', $ProdImg_name);
											$ProdImgcheck = strtolower(end($ProdImgext));
											$ProdImgextstore = array("jpg", "png", "jpeg");
											if (in_array($ProdImgcheck, $ProdImgext)) {
												move_uploaded_file($ProdImg_tmp_name, $ProdImg_address);
											}




											#ProdImg2
											$ProdImg2_name = $_FILES['ProdImg2']['name'];
											$ProdImg2_type = $_FILES['ProdImg2']['type'];
											$ProdImg2_tmp_name = $_FILES['ProdImg2']['tmp_name'];
											$ProdImg2_size = $_FILES['ProdImg2']['size'];
											$ProdImg2_address = "mobileimage/" . $ProdImg2_name;

											$ProdImg2ext = explode('.', $ProdImg2_name);
											$ProdImg2check = strtolower(end($ProdImg2ext));
											$ProdImg2extstore = array("jpg", "png", "jpeg");
											if (in_array($ProdImg2check, $ProdImg2ext)) {
												move_uploaded_file($ProdImg2_tmp_name, $ProdImg2_address);
											}



											#ProdImg3
											$ProdImg3_name = $_FILES['ProdImg3']['name'];
											$ProdImg3_type = $_FILES['ProdImg3']['type'];
											$ProdImg3_tmp_name = $_FILES['ProdImg3']['tmp_name'];
											$ProdImg3_size = $_FILES['ProdImg3']['size'];
											$ProdImg3_address = "mobileimage/" . $ProdImg3_name;

											$ProdImg3ext = explode('.', $ProdImg3_name);
											$ProdImg3check = strtolower(end($ProdImg3ext));
											$ProdImg3extstore = array("jpg", "png", "jpeg");
											if (in_array($ProdImg3check, $ProdImg3ext)) {
												move_uploaded_file($ProdImg3_tmp_name, $ProdImg3_address);
											}




											#ProdImg4
											$ProdImg4_name = $_FILES['ProdImg4']['name'];
											$ProdImg4_type = $_FILES['ProdImg4']['type'];
											$ProdImg4_tmp_name = $_FILES['ProdImg4']['tmp_name'];
											$ProdImg4_size = $_FILES['ProdImg4']['size'];
											$ProdImg4_address = "mobileimage/" . $ProdImg4_name;

											$ProdImg4ext = explode('.', $ProdImg4_name);
											$ProdImg4check = strtolower(end($ProdImg4ext));
											$ProdImg4extstore = array("jpg", "png", "jpeg");
											if (in_array($ProdImg4check, $ProdImg4ext)) {
												move_uploaded_file($ProdImg4_tmp_name, $ProdImg4_address);
											}





											if (
												empty($ComId) || empty($ProdName) || empty($ProdDesc) || empty($ProdPrice) || empty($ProdQunt)
											) {
												echo "Enter the All Field.";
											} else {


												mysqli_query($con, "INSERT INTO `tbl_product` (`prod_name`, `description`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `com_id`) VALUES ('$ProdName', '$ProdDesc', '$ProdPrice', '$ProdQunt', '$ProdImg_address', '$ProdImg2_address', '$ProdImg3_address', '$ProdImg4_address', '$ComId')");
											}
										}
										?>
										<form action="#" method="post" enctype="multipart/form-data">
											<select class="mx-5" name="txtCompName">
												<option value="-1">---Select Company---</option>

												<?php
												$query = "select com_id,company from tbl_company";
												$res = mysqli_query($con, $query);
												while ($rows = mysqli_fetch_array($res)) {
													echo "<option value=" . $rows['com_id'] . ">" . $rows['company'] . "</option>";
												}


												?>

											</select>


											<input class="mx-5 my-3" type="text" placeholder="Product Name" name="txtProdName" id="ProdName" value="<?php if (isset($ProdName)) echo $ProdName; ?>" />


											<input class="mx-5 my-3" type="text" placeholder="Product Description" rows="7" name="txtProdDesc" id="ProdDesc" value="<?php if (isset($ProdDesc)) echo $ProdDesc; ?>" />


											<input class="mx-5 my-3" type="text" placeholder="Price" name="txtProdPrice" id="ProdPrice" value="<?php if (isset($ProdPrice)) echo $ProdPrice; ?>" />


											<input class="mx-5" type="text" placeholder="Quantity" name="txtProdQunt" id="ProdQunt" value="<?php if (isset($ProdQunt)) echo $ProdQunt; ?>" />


											<input class="mx-5" type="hidden" name="MAX_FILE_SIZE" value="2000000" />
											<label class="mx-5">Main Image</label>

											<input class="mx-5" type="file" placeholder="Image" name="ProdImg" id="ProdImgs" size="35" class="btn btn-default" />

											<label class="mx-5">Image2</label>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg2" id="ProdImgs2" size="35" class="btn btn-default" />

											<label class="mx-5">Image3</label>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg3" id="ProdImgs3" size="35" class="btn btn-default" />

											<label class="mx-5">Image4</label>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg4" id="ProdImgs4" size="35" class="btn btn-default" />

											<button type="submit" name="btnSubmit" class="btn btn-default mx-5 mb-2">Submit</button>


										</form>
									</div>
									<!--/login form-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!--Footer-->

	<?php
	include "footer.php";
	?>
	<!--/Footer-->
</body>

</html>