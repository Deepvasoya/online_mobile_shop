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



        <div class="col-10 container bg-light my-5 text-center">
            <h1 class="my-3"><i class="fa fa-first-order" aria-hidden="true"></i> Your Order Details</h1>
        </div>


        <?php
        $custid = $_SESSION['id'];
        $q = "SELECT * FROM `adddeatails` WHERE c_id = '$custid' ORDER BY ordersid DESC";
        $r = mysqli_query($con, $q);
        $i = 1;
        while ($row = mysqli_fetch_array($r)) {
            $ordersid = $row['ordersid'];
            $q2 = "select * from orderdetails where ordersid = '$ordersid'";
            $r2 = mysqli_query($con, $q2);
            while ($row2 = mysqli_fetch_array($r2)) {
                $prodid = $row2['prod_id'];
                $q3 = "SELECT * FROM `tbl_product` WHERE prod_id = '$prodid'";
                $r3 = mysqli_query($con, $q3);
                while ($row3 = mysqli_fetch_array($r3)) {
                    $q4 = "SELECT * FROM `tbl_register` WHERE cust_id = '$custid'";
                    $r4 = mysqli_query($con, $q4);

                    while ($row4 = mysqli_fetch_array($r4)) {
        ?>

                        <div class="col-10 container bg-light" style=" margin-top: 100px;">
                            <div class="container">
                                <h3 class="my-5"><b>Order No : <?php echo $i ?></b></h3>
                                <table class="table" style="font-size: 15px;">
                                    <thead>
                                        <tr class="bg-success" style="font-size: 20px;">
                                            <th scope="col">User details</th>
                                            <th scope="col">Bill Address</th>
                                            <th scope="col">Shipping Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label>Order On:-</label><?php echo $row['date'] ?></td>
                                            <td><label>Address:-</label><?php echo $row['address'] ?></td>
                                            <td><label>Address:-</label><?php echo $row['paddress'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Name:-</label><?php echo $row['fname'] . " " . $row["lname"] ?></td>
                                            <td><label>Phone No:-</label><?php echo $row['phoneno'] ?></td>
                                            <td><label>Phone No:-</label><?php echo $row['pphoneno'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Email id:-</label><?php echo $row4['email_add'] ?></td>
                                            <td><label>Country:-</label><?php echo $row['country'] ?></td>
                                            <td><label>Country:-</label><?php echo $row['pcountry'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Phone No:-</label><?php echo $row['phoneno'] ?></td>
                                            <td><label>State:-</label><?php echo $row['state'] ?></td>
                                            <td><label>State:-</label><?php echo $row['pstate'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Gender:-</label><?php echo $row4['gender'] ?></td>
                                            <td><label>City:-</label><?php echo $row['city'] ?></td>
                                            <td><label>City:-</label><?php echo $row['pcity'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table my-5" style="font-size: 15px;">
                                            <thead>
                                                <tr class="bg-success" style="font-size: 20px;">
                                                    <th scope="col">Product Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row3['prod_name'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table my-5" style="font-size: 15px;">
                                            <thead>
                                                <tr class="bg-success" style="font-size: 20px;">
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row3['description'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table my-5" style="font-size: 15px;">
                                            <thead>
                                                <tr class="bg-success" style="font-size: 20px;">
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>&#8377; - <?php echo $row3['price'] ?></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </table>
                                        <table class="table" style="font-size: 15px;">
                                            <thead>
                                                <?php
                                                $status = $row['order_status'];
                                                if ($status == "COMPLETED") {
                                                    echo '<a style="font-size: 15px;" href="_returnorder.php?ordersid=' . $row["ordersid"] . '&cust_id=' . $row4["cust_id"] . '" class="btn btn-warning mx-2"><i class="fa fa-truck" aria-hidden="true"></i> Return Order</a>';
                                                } else {
                                                    echo '<a style="font-size: 15px;" href="_ordertrack.php?ordersid=' . $row["ordersid"] . '&cust_id=' . $row4["cust_id"] . '" class="btn btn-primary mx-2"><i class="fa fa-truck" aria-hidden="true"></i> Track your order</a>';
                                                }
                                                ?>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table my-5" style="font-size: 15px;">
                                            <thead>
                                                <tr class="bg-success text-center" style="font-size: 20px;">
                                                    <th scope="col">Photo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td> <?php
                                                            $img = $row3['image'];
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
                                                            ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table" style="font-size: 15px;">
                                            <thead>
                                                <?php
                                                $status = $row['order_status'];
                                                if ($status == "COMPLETED") {
                                                    echo '<h3 style="color: green;"><i class="fa fa-check-circle" aria-hidden="true"></i> Order Successfully Completed.</h3>';
                                                } else {
                                                    echo '<a style="font-size: 15px;" href="_deleteorder.php?ordersid=' . $row["ordersid"] . '" class="btn btn-danger mx-2"><i class="fa fa-trash-o"></i> Cancel order</a>';
                                                }
                                                ?>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
        <?php
                    }
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