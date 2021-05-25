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
        <title>Order| Mobile Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/copyform.js"></script>

        <link rel="shortcut icon" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
        <link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
    </head>
    <!--/head-->

    <body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">
        <!-- header -->
        <?php include '_nav.php' ?>



        <?php
        require 'item.php';

        $oid =  $_SESSION['oid'];
        $txtid =  $_SESSION['TID'];

        $qry = "UPDATE `payments` SET `transaction_id`= '$txtid' WHERE orderid = '$oid'";
        mysqli_query($con, $qry);

        ?>






        <div class="container bg-light my-5">
            <table align="center" width="716" class="my-5">
                <tr>
                    <td style="font-size: 100px;">
                        <center>
                            <h2>
                                <font color="green"><i class="fa fa-check-circle" aria-hidden="true"></i>Your order has been placed successfully.<br>You will receive Order confirmation within short period of time.</font>
                            </h2>
                        </center>
                    </td>
                </tr>
                <tr>
                    <center>
                        <h4 class="my-5">Your Order Number Is.<?php echo $_SESSION['oid']; ?><font color="#0066FF"></font>
                        </h4>
                    </center>
                </tr>
                <tr>
                    <td style="font-size: 100px;">
                        <center>
                            <a style="font-size: 15px;" href="_orderdetails.php" class="btn btn-primary"><i class="fa fa-first-order" aria-hidden="true"></i> Check Order Status</a>
                        </center>
                    </td>
                </tr>
            </table>
        </div>

        <div class="container  my-5" style="min-height: 400px;">
        </div>

        <?php

        $Sql = "SELECT * FROM `payments` WHERE orderid = '$oid'";
        $result =  mysqli_query($con, $Sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $payment_gross = $row['payment_gross'];
            $item_number = $row['item_number'];
            $Product = $row['product_qty'];
            $dates = $row['date'];


            $Sql1 = "SELECT * FROM `tbl_product` WHERE prod_id = '$item_number'";
            $result1 =  mysqli_query($con, $Sql1);
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $pname = $row1['prod_name'];
            }

            $Sql2 = "SELECT * FROM `adddeatails` WHERE ordersid = '$oid'";
            $result2 =  mysqli_query($con, $Sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $peluname = $row2['fname'];
                $bijuname = $row2['lname'];
                $ccid = $row2['c_id'];
            }

            $Sql3 = "SELECT * FROM `tbl_register` WHERE cust_id = '$ccid'";
            $result3 =  mysqli_query($con, $Sql3);
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $email_id = $row3['email_add'];
            }
        }


        $to_email = $email_id;
        $subject = "Your Order has been placed successfully";
        $body = "Hi,$peluname show your order details
                        Name -- $peluname $bijuname
                        Product Name -- $pname
                        Total Quantity -- $Product
                        Price -- $payment_gross
                        Payment -- Paid
                        Date -- $dates
				";
        $headers = "From: deepvasoya103279@gmail.com";

        if (mail(
            $to_email,
            $subject,
            $body,
            $headers
        )) {
            // echo "Email successfully sent to $to_email...";
        } else {
            // echo "Email sending failed...";
        }
        ?>
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