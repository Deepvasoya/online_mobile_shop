<?php
include('connection.php');

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

    $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `comment`, `date`) VALUES ('$fname', '$email', '$subject', '$comm', current_timestamp())";
    if (mysqli_query($con, $sql)) {
      $alert = true;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">
      <a class="navbar-brand mx-3" href="#" style="color: red; font-size: 30px"><img src="images/home/logoh.png" alt="" width="80" height="40" class="d-inline-block align-top">
        Mob-shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="first.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="About.php">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Contact_us.php">Contact us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  if ($alert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> we will contact you soon.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  if ($err) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Eroor!</strong>Enter the All Fields.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>

  <div class="container bg-light text-center my-5">
    <h1>Contact Us</h1>
  </div>


  <div class="container bg-light mb-5">
    <div class="row">
      <div class="col my-5">
        <div id="googleMap" style="width:500px;height:450px;" class="container">

        </div>
      </div>
      <div class="col">
        <div class="container my-5">
          <form method="POST" action="Contact_us.php">
            <div class="form-group">
              <input type="text" class="form-control" name="fn" placeholder="Your Name">
            </div>
            <div class="form-group my-5">
              <input type="email" class="form-control" name="em" placeholder="Your Email">
            </div>
            <div class="form-group my-5">
              <input type="text" class="form-control" name="sb" placeholder="Your Subject">
            </div>
            <div class="form-group my-5">
              <textarea class="form-control" placeholder="Comment..." name="cm" rows="3"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">SEND EMAIL</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="container bg-light mb-5">
    <div class="my-4" style="font-size: 15px; padding-left: 50px; padding-bottom: 20px;">
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
  <!-- footer -->
  <div class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 text-light">
          <div class="footer_inside">
            <h3>General</h3>
            <div class="footer_nav">
              <ul>
                <li><a>My Account</a></li>
                <!-- <li><a href="/marketplace/seller/login">Seller</a></li>-->
                <li><a>Wishlist</a></li>
                <li><a>Customer Service</a></li>
                <li><a>Privacy Policy</a></li>
                <li><a>Faq's</a></li>
                <li><a>Reward Points</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-4 text-light">
          <div class="footer_inside">
            <h3>Information</h3>
            <div class="footer_nav">
              <ul>
                <li><a>Trusted Store</a></li>
                <li><a>Fast Delivery</a></li>
                <li><a>Purchase Protection</a></li>
                <li><a>Genuine Brands</a></li>
                <li><a>Best After Sale Service</a></li>
                <li><a>Our Stores</a></li>
                <li><a>Return Policy</a></li>
                <li><a>Terms &amp; Conditions</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-sm-4 text-light">
          <div class="footer_inside">
            <h3>Deals of the day!</h3>
            <div class="footer_nav">
              <ul>
                <li><a>Smart Phones</a></li>
                <li><a>Accessories</a></li>
                <li><a>Tablets</a></li>
                <li><a>Headphones</a></li>
                <li><a>Cover Glass</a></li>
                <li><a>Bluetooth Headsets</a></li>
                <li><a>Power Bank</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer mt-auto py-3 bg-light mb-0">
    <div class="container text-center">
      <span class="text-gray-dark">Copyright &copy; MOBILESHOP™ 2021</span>
    </div>
  </footer>



  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>

</html>