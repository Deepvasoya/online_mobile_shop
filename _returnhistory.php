<?php
include('connection.php');
session_start();
if ($_SESSION["user"] != "") {
    require 'item.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>RETURN| Mobile Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <script src="js/quenty.js"></script>

        <link rel="shortcut icon" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
        <style>
            input {
                font-size: 30px;
            }
        </style>
    </head>
    <!--/head-->

    <body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">


        <!-- header -->
        <?php include '_nav.php' ?>



        <div class="col-10 container bg-light my-5 text-center">
            <h1 class="my-3"><i class="fa fa-first-order" aria-hidden="true"></i> Your all return orders</h1>
        </div>


        <?php
        $custid = $_SESSION['id'];
        $q = "SELECT * FROM `returnorder` WHERE `cid` = '$custid' ORDER BY `oid` DESC";
        $r = mysqli_query($con, $q);
        $i = 1;
        while ($row = mysqli_fetch_array($r)) {
            $itemname = $row['itemname'];
            $status = $row['status'];
            $reason = $row['reason'];
            $product_qty = $row['quantity'];
            $comment = $row['comment'];
            $oid = $row['oid'];
            $q2 = "SELECT * FROM `payments` WHERE `orderid` = '$oid'";
            $r2 = mysqli_query($con, $q2);
            while ($row2 = mysqli_fetch_array($r2)) {
                $itemno = $row2['item_number'];
                $q3 = "SELECT * FROM `tbl_product` WHERE `prod_id` = '$itemno'";
                $r3 = mysqli_query($con, $q3);
                while ($row3 = mysqli_fetch_array($r3)) {
                    $prod_name = $row3['prod_name'];
                    $img = $row3['image'];
        ?>

                    <div class="col-10 container bg-light" style=" margin-top: 100px;">
                        <div class="container">
                            <h3 class="my-5"><b>Return Order No : <?php echo $i ?></b></h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-4 my-5 mx-5">
                                    <?php
                                    $file_folder = 'admin/mobileimage/';
                                    $ProdImg = $file_folder . $img;
                                    if (file_exists($ProdImg)) {
                                        $fpath = $ProdImg;
                                    } else {
                                        $fpath = "admin/mobileimage/no_preview.jpg";
                                    }
                                    //echo $fpath;
                                    //return;

                                    echo "<img src='$fpath' height='260' width='300'>";
                                    ?>
                                </div>
                                <div class="col my-5">
                                    <h3 class="my-3 text-success"><?php echo $itemname; ?></h3>
                                    <h4 class="my-3 text-dark">Quantity to return : <?php echo $product_qty; ?></h4>
                                    <h4 class="my-3 text-dark">Reason : <?php echo $reason; ?></h4>
                                    <h4 class="my-3 text-dark">Comment : <?php echo $comment; ?></h4>
                                    <?php

                                    if ($status == 'NEW') {
                                        echo '<h3 class="my-5 text-primary">Your return order request has been processed</h3>';
                                    }
                                    if ($status == 'APPROVAL') {
                                        echo '<h3 class="my-5 text-primary">Your return order request has been processed</h3>';
                                    }
                                    if ($status == 'REJECT') {
                                        echo '<h3 class="my-5 text-danger">Your return order request has been Rejected</h3>';
                                    }
                                    if ($status == 'COMPLETED') {
                                        echo '<h3 class="my-5 text-success">Your return order request has been Completed</h3>';
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

        <?php
                }
            }
            $i++;
        }

        ?>


        <div class="container my-5"></div>

        <!--/Footer-->
        <?php include '_footer.php' ?>


        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:first.php");
}

?>