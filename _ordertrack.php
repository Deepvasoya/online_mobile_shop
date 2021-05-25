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
        <title>Address| Mobile Shop</title>
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
        <div class="container my-5">
            <a href="_orderdetails.php" style="font-size: 20px;" class="btn btn-primary btn-sm my-auto active" role="button"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        </div>

        <div class="container bg-light my-5 text-center">
            <h1 class="my-3"> Track your order</h1>
        </div>

        <?php
        $orderid = $_REQUEST['ordersid'];

        $q = "SELECT * FROM `adddeatails` WHERE ordersid = '$orderid'";
        $r = mysqli_query($con, $q);

        while ($row = mysqli_fetch_array($r)) {
            $orderstatus = $row['order_status'];
            // echo $orderstatus;
        ?>
            <div class="container my-5 bg-light">
                <table class="table" style="margin-bottom:30px;">
                    <thead>
                        <tr style="font-size: 15px;">
                            <th scope="col"><label>OrderID:-</label></th>
                            <th scope="col"><label>Shipping BY:-</label></th>
                            <th scope="col"><label>Status:-</label></th>
                            <th scope="col"><label>Date:-</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size: 15px;">
                            <td><?php echo $orderid ?></td>
                            <td>MOB-SHOP, | <i class="fa fa-phone"></i> +98765432110
                            </td>
                            <td><?php echo $row['order_status'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <h3>Ordered</h3>
                    <h3>Shipped</h3>
                    <h3>On the way</h3>
                    <h3>Delivered</h3>
                </div>
                <input style="width: 20px;height: 40px;" type="radio" value="new" <?php if ($orderstatus == "NEW") echo "checked"; ?>>
                <progress style="font-size: 40px;" value="<?php if ($orderstatus == "NEW") {
                                                            } else {
                                                                if ($orderstatus == "APPROVAL") {
                                                                    echo "50";
                                                                }
                                                            } ?>" max="100"></progress>
                <input style="width: 20px;height: 40px;" type="radio" value="ship" <?php if ($orderstatus == "SHIPPED") echo "checked"; ?>>
                <progress style="font-size: 40px;" value="<?php if ($orderstatus == "NEW") {
                                                            } else {
                                                                if ($orderstatus == "SHIPPED") {
                                                                    echo "50";
                                                                }
                                                            } ?>" max="100"></progress>
                <input style="width: 20px;height: 40px;" type="radio" value="del" <?php if ($orderstatus == "DELIVARY") echo "checked"; ?>>
                <progress style="font-size: 40px;" value="<?php if ($orderstatus == "NEW") {
                                                            } else {
                                                                if ($orderstatus == "DELIVARY") {
                                                                    echo "50";
                                                                }
                                                            } ?>" max="100"></progress>
                <input style="width: 20px;height: 40px;" type="radio" value="com" <?php if ($orderstatus == "COMPLETED") echo "checked"; ?>>
            </div>

        <?php
        }
        ?>
        <div class="container" style="min-height: 200px;">
        </div>

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