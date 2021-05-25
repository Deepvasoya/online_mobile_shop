<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {
?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Mobile Shop</title>
    </head>

    <body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">



        <!-- navbar -->
        <?php include '_nav.php' ?>



        <div class="container bg-light text-center my-5">
            <h1>About Us</h1>
        </div>
        <div class="container bg-light mb-5">
            <div class="row">
                <div class="col">
                    <div class="title-about-us">
                        <h2 class="text-center"><span style="font-size: medium;">Welcome to our shop</span></h2>
                    </div>
                    <div class="content-about-us">
                        <div class="image-about-us"><img alt="About Us" src="images/shop.jfif"></div>
                        <p class="des-about-us" style="text-align: justify;"><br><span style="font-size: 15px;">We are giving a one-stop solution to the customers by providing all mobile brands, Mobile Accessories, Gadgets, and High Tech Service centres. We are the authorized offline store for selling One Plus mobile phone in Gujarat.</span></p>
                    </div>
                </div>
                <div class="col">
                    <div class="title-about-us">
                        <h2 class="text-center"><span style="font-size: medium;">Why Choose Us</span></h2>
                    </div>
                    <div>
                        <ul style="font-size: 15px; padding-left: 50px; padding-bottom: 20px; padding-top: 20px; padding-left: 100px;">
                            <li>Easy Shipping &amp; Returns</li>
                            <li>Secure Shopping</li>
                            <li>Purchase Protection</li>
                            <li>No. 1 Mobile Retailer of Gujarat</li>
                            <li>Trusted After Sales Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" style="min-height: 100px;"></div>

        <!-- footer -->
        <?php include '_footer.php' ?>
        <!-- footer -->
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

<?php

} else {
    header("location:first.php");
}

?>