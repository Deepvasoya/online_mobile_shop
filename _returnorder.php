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
            <h1 class="my-3">Return Order Policy</h1>
        </div>

        <div class="container bg-light my-5 ">
            <ul style="font-size: 18px;">
                <li>This item is eligible for free replacement, within 5 days of delivery, in an unlikely event of defective or different/wrong item delivered to you.</li>
                <li>In the rare event that you receive a damaged device, please create a replacement request within 48 hours of order delivery. Raising a replacement request any time after 48 hours of order delivery will result in your replacement request being rejected</li>
                <li>If the replacement request is placed and the seller does not have the exact same product in stock, we will provide a refund.</li>
            </ul>
        </div>

        <div class="container bg-light my-5 ">
            <?php
            $orderid = $_GET['ordersid'];
            $custid = $_GET['cust_id'];
            $q = "SELECT * FROM `adddeatails` WHERE `ordersid` = '$orderid'";
            $r = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($r)) {
                $Date = substr($row['date'], 0, 10);
                $date = date_create($Date);
                date_add($date, date_interval_create_from_date_string("5 days"));
                $new = date_format($date, "Y-m-d");
                $currentdate =  date('Y-m-d');
                if (($currentdate > $Date && $currentdate < $new)) {
                    $q2 = "SELECT * FROM `payments` WHERE `orderid` = '$orderid'";
                    $r2 = mysqli_query($con, $q2);
                    while ($row2 = mysqli_fetch_array($r2)) {
                        $itemno = $row2['item_number'];
                        $product_qty = $row2['product_qty'];
                        $q3 = "SELECT * FROM `tbl_product` WHERE `prod_id` = '$itemno'";
                        $r3 = mysqli_query($con, $q3);
                        while ($row3 = mysqli_fetch_array($r3)) {
                            $prod_name = $row3['prod_name'];
                            $img = $row3['image'];


            ?>


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
                                        <h3 class="my-3 text-success"><?php echo $prod_name; ?></h3>
                                        <h4 class="my-3 text-dark">Quantity to return : <?php echo $product_qty; ?></h4>
                                        <?php
                                        $sql = "SELECT * FROM `returnorder` WHERE cid = '$custid' AND oid = '$orderid'";
                                        $rows = mysqli_query($con, $sql);
                                        while ($result = mysqli_fetch_array($rows)) {
                                            $rea =  $result['reason'];
                                        }
                                        $total = array("Exchange", "Replace", "Refund");

                                        if (in_array($rea, $total)) {
                                            echo '<h3 class="my-5 text-success">Your return order has been processed</h3>';
                                        } else {

                                        ?>

                                            <form method="post" action="">
                                                <div class="form-group" style="font-size: 15px;">
                                                    <label>Reason?</label>
                                                    <select class="custom-select mx-3" name="reason" id="reason" required>
                                                        <option value="Exchange">Exchange</option>
                                                        <option value="Replace">Replace</option>
                                                        <option value="Refund">Refund</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="font-size: 15px;">
                                                    <label for="exampleFormControlTextarea1">Comments*</label><br>
                                                    <textarea class="col-6" id="com" name="com" rows="2" required></textarea>
                                                </div>
                                                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod_name; ?>">
                                                <input type="hidden" id="quantity" name="quantity" value="<?php echo $product_qty; ?>">
                                                <input type="hidden" id="custid" name="custid" value="<?php echo $custid; ?>">
                                                <input type="hidden" id="orderid" name="orderid" value="<?php echo $orderid; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
            <?php   }
                    }
                } else {
                    echo '<h3 class="my-3 text-center">You are not eligible for return order request.</h3>';
                }
            }
            ?>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reason = $_POST['reason'];
            $prod_name = $_POST['prod_name'];
            $com = $_POST['com'];
            $quantity = $_POST['quantity'];
            $custid = $_POST['custid'];
            $orderid = $_POST['orderid'];

            $q = "INSERT INTO `returnorder`(`cid`, `oid`, `reason`, `comment`, `itemname`, `quantity`, `status`) VALUES ('$custid','$orderid','$reason','$com','$prod_name','$quantity','NEW')";
            if (mysqli_query($con, $q)) {
                // echo 'done';
            }
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