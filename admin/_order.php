<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}
$q = "select * from adddeatails";
$r = mysqli_query($con, $q);

$qq = "select * from tbl_order";
$r1 = mysqli_query($con, $qq);


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
                <div class="container text-center bg-light my-5">
                    <h1>Order Management</h1>
                    <table class="table my-5">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">No</th>
                                <th scope="col">Arrival Order By Register Name</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order-check</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qry_orders = "SELECT ordersid,cust_id,fname,lname,order_status FROM adddeatails A,tbl_order B WHERE order_status !='COMPLETED' AND A.ordersid= B.id";
                            $res_orders = mysqli_query($con, $qry_orders);
                            $count = mysqli_num_rows($res_orders);

                            $new = "select * from adddeatails where Order_status='NEW'";
                            $new1 = mysqli_query($con, $new);
                            $count1 = mysqli_num_rows($new1);

                            $APPROVAL = "select * from adddeatails where Order_status='APPROVAL'";
                            $APPROVAL1 = mysqli_query($con, $APPROVAL);
                            $count2 = mysqli_num_rows($APPROVAL1);

                            $PROGRESS = "select * from adddeatails where Order_status='PROGRESS'";
                            $PROGRESS1 = mysqli_query($con, $PROGRESS);
                            $count3 = mysqli_num_rows($PROGRESS1);

                            $SHIPPED = "select * from adddeatails where Order_status='SHIPPED'";
                            $SHIPPED1 = mysqli_query($con, $SHIPPED);
                            $count4 = mysqli_num_rows($SHIPPED1);

                            $DELIVARY = "select * from adddeatails where Order_status='DELIVARY'";
                            $DELIVARY1 = mysqli_query($con, $DELIVARY);
                            $count5 = mysqli_num_rows($DELIVARY1);

                            $COMPLETED = "select * from adddeatails where Order_status='COMPLETED'";
                            $COMPLETED1 = mysqli_query($con, $COMPLETED);
                            $count6 = mysqli_num_rows($COMPLETED1);

                            if (mysqli_num_rows($res_orders) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_array($res_orders)) {

                                    echo "<tr>
											<th>$i</th>
											<td>
												$row[fname] $row[lname]<a>
											</td>
											<td>
												$row[order_status]
											</td>
                                            <td>
												<span class='label label-info'>Paid</span>
											</td>
											<td>
												<a class='btn btn-primary'role='button' href='order_detail1.php?ordersid=$row[ordersid]&cust_id=$row[cust_id]'>View<a>
											</td>
											
										</tr>";
                                    $i++;
                                }
                            }


                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="container text-center bg-light my-5">
                    <h1>Order Status</h1>
                    <table class="table my-5">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">Order</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NEW ORDER:-</td>
                                <td><?php echo $count1; ?></td>
                            </tr>
                            <tr>
                                <td>APPROVAL ORDER:-</td>
                                <td><?php echo $count2; ?></td>
                            </tr>
                            <tr>
                                <td>PROGRESS ORDER:-</td>
                                <td><?php echo $count3; ?></td>
                            </tr>
                            <tr>
                                <td>SHIPPED ORDER:-</td>
                                <td><?php echo $count4; ?></td>
                            </tr>
                            <tr>
                                <td>DELIVARY ORDER:-</td>
                                <td><?php echo $count5; ?></td>
                            </tr>
                            <tr>
                                <td>COMPLETED ORDER:-</td>
                                <td><?php echo $count6; ?></td>
                            </tr>
                            <tr style="background-color:khaki;color:blue">
                                <td>TOTAL ORDER:-</td>
                                <td><?php echo $count; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>