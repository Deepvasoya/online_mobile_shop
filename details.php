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

        <?php

        $custid = $_SESSION['id'];


        if (isset($_POST['sub'])) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $add = $_POST['add'];
            $zip = $_POST['zip'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];



            if (empty($fname) || empty($lname) || empty($add) || empty($zip) || empty($city) || empty($state) || empty($country) || empty($phone)) {
                $msg = "Enter the All Fields.";

                echo '<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Error!</strong>' . $msg . '
</div>';
            } else {
                mysqli_query($con, "INSERT INTO `address` (`cid`, `fname`, `lname`, `address`, `zipcode`, `city`, `state`, `country`, `phone`) VALUES ('$custid', '$fname', '$lname', '$add', '$zip', '$city', '$state', '$country', '$phone')");
                $msg = "Address Add successfully";

                echo '<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Success!</strong> ' . $msg . '
</div>';
            }
        }
        ?>


        <div class="col-10 container bg-light my-5 text-center">
            <h1 class="my-3">Your Address Details</h1>
        </div>

        <div class="col-10 container bg-light my-5">
            <div class="row">
                <div class="col-6">
                    <form class="my-5" action="" method="post" autocomplete="off">
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">First-Name</label>
                            <input style="font-size: 15px;" placeholder="First Name *" type="text" name="fname" class="form-control" id="fname">
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">Last-Name</label>
                            <input style="font-size: 15px;" placeholder="Last Name *" type="text" name="lname" class="form-control" id="lname">
                        </div>

                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">Address</label>
                            <!-- <input style="font-size: 15px;" placeholder="Address *" type="text" name="add" class="form-control" id="add"> -->
                            <textarea class="form-control" style="font-size: 15px;" placeholder="Address *" type="text" name="add" class="form-control" id="add" rows="3" required></textarea>
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">Zip-Code</label>
                            <input style="font-size: 15px;" placeholder="Zip-Code *" type="text" name="zip" class="form-control" id="zip">
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">City</label>
                            <input style="font-size: 15px;" placeholder="City *" type="text" name="city" class="form-control" id="city">
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">State</label>
                            <input style="font-size: 15px;" placeholder="State *" type="text" name="state" class="form-control" id="state">
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">Country</label>
                            <input style="font-size: 15px;" placeholder="Country *" type="text" name="country" class="form-control" id="country">
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <label class="form-label">Phone</label>
                            <input style="font-size: 15px;" placeholder="Phone *" type="text" name="phone" class="form-control" id="phone">
                        </div>

                        <button style="font-size: 15px;" type="submit" name="sub" class="btn btn-primary">Submit</button>
                    </form>
                </div>


                <div class="col-5 mx-5">
                    <h1 class="my-3 text-center">Address</h1>
                    <hr>
                    <?php
                    $query = "SELECT * FROM `address` WHERE cid = '$custid'";
                    $res = mysqli_query($con, $query);
                    $num = mysqli_num_rows($res);
                    $row = mysqli_fetch_array($res);

                    if ($num > 0) {
                    ?>
                        <table class="table" style="font-size: 15px;">
                            <tbody>
                                <tr>
                                    <th scope="row">First-Name</th>
                                    <td><?php echo $row['fname'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last-Name</th>
                                    <td><?php echo $row['lname'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td colspan="2"> <?php echo $row['address'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Zip-Code</th>
                                    <td colspan="2"><?php echo $row['zipcode'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">City</th>
                                    <td colspan="2"><?php echo $row['city']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">State</th>
                                    <td colspan="2"><?php echo $row['state']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td colspan="2"><?php echo $row['country']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td colspan="2"><?php echo $row['phone']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="" class="btn btn-primary btn my-auto active mx-2" role="button">Edit</a><a href="_deleteaddress.php?aid=<?php echo $row['a_id']; ?>" class="btn btn-danger btn my-3 active" role="button">Delete</a>
                    <?php
                    } else {
                        echo '<div>
                    <h3 class="text-center">No Any Address</h3>
                </div>';
                    }

                    ?>
                </div>
            </div>
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