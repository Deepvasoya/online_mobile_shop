<html>

<body>

	<?php require("connection.php"); ?>


	<div class="header-middle">
		<!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li>
								<a href='checkout.php'><i class='fa fa-crosshairs'></i>Checkout</a>
							</li>
							<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
								</a></li>
							<li>
								<a><i class='fa fa-crosshairs'></i><?php echo "Welcome!-" . $_SESSION['user']; ?></a>
							</li>
							<li>
								<a href='logout.php'><i class='fa fa-unlock'></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.php"><img src="images/home/logoh.png" height="80" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-middle-->

	<div class="header-bottom">
		<!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.php" class="active"><b>Home</b></a></li>
							<li><a href="about-us.php"><b>About us</b></a>
							</li>
							<li class="dropdown"><a href="#"><b>Search By Brands</b><i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<table>
										<tr>
											<?php

											$result = mysqli_query($con, "select com_id,company from tbl_company");
											while ($row = mysqli_fetch_array($result)) {
												$_SESSION['com_id'] = $row['com_id'];
												echo "<li>";
												echo "<a href='company.php?company=" . $row['com_id'] . "'><span class='pull-right'></span>" . $row['company'], "</a>";
												echo "</li>";
											}
											?>
										</tr>
									</table>
								</ul>
							</li>
							<li><a href="contact-us.php"><b>Contact Us</b></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<form method="GET" class="searchform" action="search.php">
							<fieldset>
								<input type="text" name="search" id="search" placeholder="Search" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-bottom-->
	</header>
	<!--/header-->

</body>

</html>