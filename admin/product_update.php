<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id'])) {
	header("location:HomePage.php");
	exit();
}
$id = $_GET['id'];
$upd = "select * from tbl_product where prod_id=$id";
$result = mysqli_query($con, $upd);

while ($row = mysqli_fetch_assoc($result)) {
	$pname = $row["prod_name"];
	$desc = $row["description"];
	$price = $row["price"];
	$quantity = $row["quantity"];
	$image = $row["image"];
	$image2 = $row['image2'];
	$image3 = $row["image3"];
	$image4 = $row["image4"];
	$comid = $row["com_id"];
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



											if (empty($_FILES['ProdImg']['name']) || empty($_FILES['ProdImg2']['name']) || empty($_FILES['ProdImg3']['name']) || empty($_FILES['ProdImg4']['name'])) {
												$oldProdImgs = $_POST['ProdImgMain'];
												$oldProdImgs2 = $_POST['ProdImg22'];
												$oldProdImgs3 = $_POST['ProdImg33'];
												$oldProdImgs4 = $_POST['ProdImg44'];
											} else {


												#ProdImg
												$ProdImg_name = $_FILES['ProdImg']['name'];
												$ProdImg_type = $_FILES['ProdImg']['type'];
												$ProdImg_tmp_name = $_FILES['ProdImg']['tmp_name'];
												$ProdImg_size = $_FILES['ProdImg']['size'];


												$ProdImgext = explode('.', $ProdImg_name);
												$ProdImgcheck = strtolower(end($ProdImgext));
												$ProdImgextstore = array("jpg", "png", "jpeg");

												$ProdImgnew_name = time() . "-" . basename($ProdImg_name);
												$ProdImgtarget = "mobileimage/" . $ProdImgnew_name;
												$ProdImgimage_name = $ProdImgnew_name;

												if (in_array($ProdImgcheck, $ProdImgext)) {
													move_uploaded_file($ProdImg_tmp_name, $ProdImgtarget);
												}




												#ProdImg2
												$ProdImg2_name = $_FILES['ProdImg2']['name'];
												$ProdImg2_type = $_FILES['ProdImg2']['type'];
												$ProdImg2_tmp_name = $_FILES['ProdImg2']['tmp_name'];
												$ProdImg2_size = $_FILES['ProdImg2']['size'];


												$ProdImg2ext = explode('.', $ProdImg2_name);
												$ProdImg2check = strtolower(end($ProdImg2ext));
												$ProdImg2extstore = array("jpg", "png", "jpeg");

												$ProdImg2new_name = time() . "-" . basename($ProdImg2_name);
												$ProdImg2target = "mobileimage/" . $ProdImg2new_name;
												$ProdImg2image_name = $ProdImg2new_name;

												if (in_array($ProdImg2check, $ProdImg2ext)) {
													move_uploaded_file($ProdImg2_tmp_name, $ProdImg2target);
												}



												#ProdImg3
												$ProdImg3_name = $_FILES['ProdImg3']['name'];
												$ProdImg3_type = $_FILES['ProdImg3']['type'];
												$ProdImg3_tmp_name = $_FILES['ProdImg3']['tmp_name'];
												$ProdImg3_size = $_FILES['ProdImg3']['size'];


												$ProdImg3ext = explode('.', $ProdImg3_name);
												$ProdImg3check = strtolower(end($ProdImg3ext));
												$ProdImg3extstore = array("jpg", "png", "jpeg");

												$ProdImg3new_name = time() . "-" . basename($ProdImg3_name);
												$ProdImg3target = "mobileimage/" . $ProdImg3new_name;
												$ProdImg3image_name = $ProdImg3new_name;

												if (in_array($ProdImg3check, $ProdImg3ext)) {
													move_uploaded_file($ProdImg3_tmp_name, $ProdImg3target);
												}




												#ProdImg4
												$ProdImg4_name = $_FILES['ProdImg4']['name'];
												$ProdImg4_type = $_FILES['ProdImg4']['type'];
												$ProdImg4_tmp_name = $_FILES['ProdImg4']['tmp_name'];
												$ProdImg4_size = $_FILES['ProdImg4']['size'];


												$ProdImg4ext = explode('.', $ProdImg4_name);
												$ProdImg4check = strtolower(end($ProdImg4ext));
												$ProdImg4extstore = array("jpg", "png", "jpeg");

												$ProdImg4new_name = time() . "-" . basename($ProdImg4_name);
												$ProdImg4target = "mobileimage/" . $ProdImg4new_name;
												$ProdImg4image_name = $ProdImg4new_name;

												if (in_array($ProdImg4check, $ProdImg4ext)) {
													move_uploaded_file($ProdImg4_tmp_name, $ProdImg4target);
												}
											}



											$ComId = $_POST['txtCompName'];
											$ProdName = $_POST['txtProdName'];
											$ProdDesc = $_POST['txtProdDesc'];
											$ProdPrice = $_POST['txtProdPrice'];
											$ProdQunt = $_POST['txtProdQunt'];

											mysqli_query($con, "insert into tbl_product (com_id,prod_name,description,price,quantity,image,image2,image3,image4) values($ComId,'$ProdName','$ProdDesc','$ProdPrice','$ProdQunt','$ProdImgs','$ProdImgs2','$ProdImgs3','$ProdImgs4')");

											mysqli_query($con, "UPDATE `tbl_product` SET `prod_name` = '$ProdName', `description` = '$ProdDesc', `price` = '$ProdPrice', `quantity` = '$ProdQunt', `image` = '$ProdImgimage_name', `image2` = '$ProdImg2image_name', `image3` = '$ProdImg3image_name', `image4` = '$ProdImg4image_name', `com_id` = '$ComId' WHERE `tbl_product`.`prod_id` = $id");


											header("location:product_detail.php");
										}
										?>


										<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
											<select class="mx-5" name="txtCompName">
												<option value="-1">---Select Company---</option>

												<?php
												$query = "select com_id,company from tbl_company";
												$res = mysqli_query($con, $query);
												while ($rows = mysqli_fetch_array($res)) {
													// echo $rows['company'];

												?>

													<option value="<?php echo $rows['com_id']; ?>" <?php if ($comid == $rows['com_id']) echo "selected"; ?>><?php echo $rows['company'] ?></option>


												<?php
												}
												?>

											</select>

											<input class="mx-5 my-3" type="text" placeholder="Product Name" name="txtProdName" id="ProdName" value="<?php echo $pname ?>" />

											<input class="mx-5 my-3" type="text" placeholder="Product Description" rows="7" name="txtProdDesc" id="ProdDesc" value="<?php echo $desc ?>" />

											<input class="mx-5 my-3" type="text" placeholder="Price" name="txtProdPrice" id="ProdPrice" value="<?php echo $price ?>" />

											<input class="mx-5" type="text" placeholder="Quantity" name="txtProdQunt" id="ProdQunt" value="<?php echo $quantity ?>" />

											<input class="mx-5" type="hidden" name="MAX_FILE_SIZE" value="2000000" />
											<label class="mx-5">Main Image</label>
											<img src="mobileimage/<?php echo $image; ?>" height="150px"><br>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg" id="ProdImgs" size="35" class="btn btn-default" />
											<input type="hidden" name="ProdImgMain" value="<?php echo $image; ?>">



											<label class="mx-5">Image2</label>
											<img src="mobileimage/<?php echo $image2; ?>" height="150px"><br>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg2" id="ProdImgs2" size="35" class="btn btn-default" />
											<input type="hidden" name="ProdImg22" value="<?php echo $image2; ?>">


											<label class="mx-5">Image3</label>
											<img src="mobileimage/<?php echo $image3; ?>" height="150px"><br>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg3" id="ProdImgs3" size="35" class="btn btn-default" />
											<input type="hidden" name="ProdImg33" value="<?php echo $image3; ?>">


											<label class="mx-5">Image4</label>
											<img src="mobileimage/<?php echo $image4; ?>" height="150px"><br>
											<input class="mx-5" type="file" placeholder="Image" name="ProdImg4" id="ProdImgs4" size="35" class="btn btn-default" />
											<input type="hidden" name="ProdImg44" value="<?php echo $image4; ?>">

											<button type="submit" name="btnSubmit" class="btn btn-default mx-5 mb-2">Update</button>


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



	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>