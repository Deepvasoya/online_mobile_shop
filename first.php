<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Mobile Shop</title>
</head>

<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">



  <!-- navbar -->
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
        <form class="d-flex my-2">
          <a href="" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#loginmodel">Login</a>
          <a href="" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupmodel">Sign up</a>
        </form>
      </div>
    </div>
  </nav>

  <?php
  include "_login.php";
  include "_signup.php";

  ?>

  <!-- slider -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <img src="images/s1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="1000">
        <img src="images/s2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/s3.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="container my-5 bg-light">
    <div class="top_icon_part_inside">
      <div class="row">
        <div class="col-sm-3">
          <div class="top_icon_inline">
            <div class="top_icon_inline_img"><img alt="Best Price" src="images/icon01.png"></div>
            <h3>Best Price</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="top_icon_inline">
            <div class="top_icon_inline_img"><img alt="Best Services" src="images/icon02.png"></div>
            <h3>Best Services</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="top_icon_inline">
            <div class="top_icon_inline_img"><img alt="Since 1994" src="images/icon03.png"></div>
            <h3>Since 1994</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="top_icon_inline">
            <div class="top_icon_inline_img"><img alt="Free Shipping" src="images/icon04.png"></div>
            <h3>Free Shipping<small><sup>*</sup></small></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container bg-light text-center my-5">
    <h1>SUPER DISCOUNT</h1>
  </div>

  <!-- mobile -->
  <div class="container mb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m1.png" class="card-img-top" alt="Samsung">
          <div class="card-body">
            <h5 class="card-title text-center">Samsung Galaxy Z Flip (Black, 8 GB, 256 GB)</h5>
            <h5 class="card-title text-center">₹62,999.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m2.png" class="card-img-top" alt="Apple">
          <div class="card-body">
            <h5 class="card-title text-center">Apple iPhone 11 (Black, 4 GB, 64 GB)</h5>
            <h5 class="card-title text-center">₹54,900.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m3.png" class="card-img-top" alt="Nokia">
          <div class="card-body">
            <h5 class="card-title text-center">HTC Desire 12 + (3GB RAM, 32GB Storage)</h5>
            <h5 class="card-title text-center">₹18,672.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m4.png" class="card-img-top" alt="HTC">
          <div class="card-body">
            <h5 class="card-title text-center">POCO X3 (Shadow Gray, 128 GB) (6 GB RAM)</h5>
            <h5 class="card-title text-center">₹15,499.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m5.jpg" class="card-img-top" alt="Vivo">
          <div class="card-body">
            <h5 class="card-title text-center">Vivo V20 Pro 5G (Sunset Melody, 8 GB, 128 GB)</h5>
            <h5 class="card-title text-center">₹62,999.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m6.png" class="card-img-top" alt="Motorola">
          <div class="card-body">
            <h5 class="card-title text-center">Vivo Y20 (4GB RAM, 64GB)</h5>
            <h5 class="card-title text-center">₹12,999.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m7.jpg" class="card-img-top" alt="Sony">
          <div class="card-body">
            <h5 class="card-title text-center">Google Pixel 5 5G Sorta Sage, 8GB, 128GB</h5>
            <h5 class="card-title text-center">₹67,850.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>

          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m8.jpg" class="card-img-top" alt="Oppo">
          <div class="card-body">
            <h5 class="card-title text-center">OPPO F17 Pro (Magic Blue, 128 GB) (8 GB RAM)</h5>
            <h5 class="card-title text-center">₹21,490.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m9.png" class="card-img-top" alt="Oneplus">
          <div class="card-body">
            <h5 class="card-title text-center">OnePlus Nord (Grey Onyx, 12 GB, 256 GB)</h5>
            <h5 class="card-title text-center">₹29,999.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>

          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="images/m10.jpeg" class="card-img-top" alt="Honor">
          <div class="card-body">
            <h5 class="card-title text-center">Honor 10 Lite (Midnight Black, 32 GB) (3 GB RAM)</h5>
            <h5 class="card-title text-center">₹13,999.00</h5>
            <a href="" style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodel">Buy</a>
          </div>
        </div>
      </div>

    </div>
  </div>





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

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>