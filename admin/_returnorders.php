<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("location:index.php");
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
                    <h1>Return Order Management</h1>
                    <table class="table my-5">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">No</th>
                                <th scope="col">Return Order By Register Name</th>
                                <th scope="col">Return Order Status</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Order-check</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `returnorder` ORDER BY `id` DESC";
                            $r = mysqli_query($con, $sql);
                            $count = mysqli_num_rows($r);
                            $i = 1;
                            if (mysqli_num_rows($r) > 0) {
                                while ($row = mysqli_fetch_array($r)) {
                                    $reason = $row['reason'];
                                    $status = $row['status'];
                                    $cid = $row['cid'];
                                    $oid = $row['oid'];
                                    $q2 = "SELECT * FROM `adddeatails` WHERE `ordersid` = '$oid'";
                                    $r2 = mysqli_query($con, $q2);
                                    while ($row2 = mysqli_fetch_array($r2)) {


                            ?>
                                        <tr>
                                            <th><?php echo  $i  ?></th>
                                            <td>
                                                <?php echo $row2['fname'];  ?> <?php echo $row2['lname'];  ?>
                                            </td>
                                            <td>
                                                <?php echo  $status  ?>
                                            </td>
                                            <td>
                                                <?php echo $reason  ?>
                                            </td>
                                            <td>
                                                <a class='btn btn-primary' role='button' href='_returnorderdeatils.php?ordersid=<?php echo $oid; ?>&cust_id=<?php echo $cid; ?>'>View<a>
                                            </td>

                                        </tr>
                            <?php
                                    }
                                    $i++;
                                }
                            } else {
                                echo '<h3 class="my-5 text-success">No Any return order</h3>';
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
                <?php
                $new = "SELECT * FROM `returnorder` WHERE `status` = 'NEW'";
                $new1 = mysqli_query($con, $new);
                $count1 = mysqli_num_rows($new1);

                $APPROVAL = "SELECT * FROM `returnorder` WHERE `status` = 'APPROVAL'";
                $APPROVAL1 = mysqli_query($con, $APPROVAL);
                $count2 = mysqli_num_rows($APPROVAL1);

                $REJECT  = "SELECT * FROM `returnorder` WHERE `status` = 'REJECT'";
                $REJECT1 = mysqli_query($con, $REJECT);
                $count3 = mysqli_num_rows($REJECT1);

                $COMPLETED = "SELECT * FROM `returnorder` WHERE `status` = 'COMPLETED'";
                $COMPLETED1 = mysqli_query($con, $COMPLETED);
                $count6 = mysqli_num_rows($COMPLETED1);

                ?>
                <div class="container text-center bg-light my-5">
                    <h1>Return Order Status</h1>
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
                                <td>REJECT ORDER:-</td>
                                <td><?php echo $count3; ?></td>
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