<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Mobile Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/quenty.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    </head>

    <body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">
        <?php include '_nav.php' ?>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1000">

                    <img src="images/home/s1.jpg" width="400px" height="900px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-info"><b><span><big>S</big></span>AMSUNG</b></h1>
                        <h3 class="text-info">SAMSUNG MOBILE PHONE</h3>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="500">
                    <img src="images/home/s2.jpg" width="400px" height="900px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-info"><b><span><big>A</big></span>PPLE</b></h1>
                        <h3 class="text-info">IPHONE 12</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/home/s3.jpg" width="400px" height="900px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-info"><b><span><big>N</big></span>OKIA</b></h1>
                        <h3 class="text-info">MICROSOFT BUILD</h3>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container my-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 mx-5 bg-light">
                        <div class="left-sidebar">
                            <div class="brands_products">
                                <!--brands_products-->
                                <h2 class="text-center bg-primary">BRANDS</h2>
                                <div class="my-5">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <ul>
                                                <?php

                                                $result = mysqli_query($con, "select com_id,company from tbl_company");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $_SESSION['com_id'] = $row['com_id'];
                                                    // echo "<li>";
                                                    echo "<a style='font-size: 15px;' class='dropdown-item' href='company.php?company=" . $row['com_id'] . "'><i class='fa fa-mobile' aria-hidden='true'></i>     <span class='pull-right'></span>" . $row['company'], "</a>";
                                                    // echo "</li>";
                                                }
                                                ?>
                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 bg-light">
                        <div class="features_items home_feature">
                            <!--features_items-->
                            <h2 class="text-center bg-primary">FEATURES ITEMS</h2>
                            <div id="product_loading" class="my-5">
                                <?php

                                $sql = "select * from tbl_product";

                                $r = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_array($r)) {
                                    $ProdId = $row['prod_id'];
                                    $ComId = $row['com_id'];

                                ?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">

                                                    <?php// simage($row['image']) ?>
                                                    <img class="home_img" src="admin/mobileimage/<?php echo $row['image']; ?>" height="300px" width="197px" /><br><br>
                                                    <h2 class="price">Rs.<?php echo $row['price'] ?></h2><br>
                                                    <h2 class="pro_name"><?php echo $row['prod_name'] ?></h2>
                                                    <a href="cart.php?prod_id=<?php echo $row['prod_id'] ?>" class=" btn btn-default add-to-cart"><i class='fa fa-shopping-cart'></i>Add to cart</a>
                                                    <a href="proddetail.php?prod_id=<?php echo $row['prod_id'] ?>" class=" btn btn-default view1">View Details</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(document).ready(function() {
                $('#min_price').change(function() {
                    var price = $(this).val();
                    $("#price_range").text("Product under Price Rs." + price);
                    $.ajax({
                        url: "load_product.php",
                        method: "POST",
                        data: {
                            price: price
                        },
                        success: function(data) {
                            $("#product_loading").fadeIn(500).html(data);
                        }
                    });
                });
            });
        </script>

        <?php include '_footer.php' ?>

    </body>

    </html>
<?php

} else {
    header("location:first.php");
}

?>