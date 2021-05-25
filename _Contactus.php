<?php

include('connection.php');
session_start();

if ($_SESSION["user"] != "") {


    $alert = false;
    $err = false;
    if (isset($_POST['submit'])) {
        $not = false;
        $fname = $_POST['fn'];
        $email = $_POST['em'];
        $subject = $_POST['sb'];
        $comm =  $_POST['cm'];

        if (empty($fname) || empty($email) || empty($subject) || empty($comm)) {
            $err = true;
        } else {
            mysqli_query($con, "insert into tbl_feedback (name,email_id,subject,desc_feedback) values ('$fname','$email','$subject','$comm')");
            $alert = true;
        }
        mysqli_close($con);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Mobile Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <meta name="author" content="">
        <link href="css/responsive.css" rel="stylesheet">

        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js">
        </script>

        <script>
            var myCenter = new google.maps.LatLng(21.2361541, 72.8761582);

            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 5,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                var marker = new google.maps.Marker({
                    position: myCenter,
                });

                marker.setMap(map);

                var infowindow = new google.maps.InfoWindow({
                    content: "My Mobile Shop!"
                });

                infowindow.open(map, marker);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <!--/head-->

    <body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">

        <!-- nav -->
        <?php include '_nav.php' ?>
        <div style="margin-top: 30px;" class="container bg-light mb-5">
            <div class="row">
                <h1 class="text-center my-5">Contact Us</h1>
                <div class="col my-5">
                    <div id="googleMap" style="width:500px;height:300px;" class="container">

                    </div>
                </div>
                <div class="col">
                    <div class="container my-5">
                        <?php
                        if ($alert) {

                            echo '<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Success!</strong>Thank you for giving feedback.
</div>';
                        }
                        if ($err) {

                            echo '<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Eroor!</strong>Enter the All Fields.
</div>';
                        }
                        ?>
                        <h2 class="title text-center">Feedback</h2>
                        <form method="POST" action="_Contactus.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="fn" placeholder="Your Name">
                            </div>
                            <div class="form-group my-4">
                                <input type="email" class="form-control" name="em" placeholder="Your Email">
                            </div>
                            <div class="form-group my-4">
                                <input type="text" class="form-control" name="sb" placeholder="Your Subject">
                            </div>
                            <div class="form-group my-4">
                                <textarea class="form-control" placeholder="Comment..." name="cm" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="container bg-light mb-5">
            <div class="my-4" style="font-size: 15px; padding-left: 50px;">
                <h3 class="text-center">Address</h3>
                <p>Mob-Shop</p>
                <p>Amrut Comm. Complex, Sardar Nagar Main Road, Rajkot</p>
                <p>Gujarat INDIA</p>
                <p>Mobile: +91 9876543210</p>
                <p>Land-Line: 0261-222 33 44</p>
                <p>Email: info@mshop.com</p>

            </div>
        </div>



        <!-- footer -->
        <?php include '_footer.php' ?>
        <!-- footer -->




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