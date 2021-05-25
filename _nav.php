<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php require("connection.php"); ?>
    <nav style="margin-bottom: 0px;" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" href="#" style="color: red; font-size: 30px"><img src="images/home/logoh.png" alt="" width="80" height="40" class="d-inline-block align-top">
                Mob-shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="font-size: 15px;" class="nav-link active" aria-current="page" href="_index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown mx-3">
                        <a style="font-size: 15px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fa fa-search' aria-hidden='true'></i>
                            Search By Brands
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php

                            $result = mysqli_query($con, "select com_id,company from tbl_company");
                            while ($row = mysqli_fetch_array($result)) {
                                $_SESSION['com_id'] = $row['com_id'];
                                echo "<li>";
                                echo "<a style='font-size: 15px;' class='dropdown-item' href='company.php?company=" . $row['com_id'] . "'><i class='fa fa-mobile' aria-hidden='true'></i> <span class='pull-right'></span>" . $row['company'], "</a>";
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item mx-3">
                        <a style="font-size: 15px;" class="nav-link" href="_About.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size: 15px;" class="nav-link" href="_Contactus.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 mx-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success mx-2 " type="submit">Search</button>
                    <div class="col-sm-4">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav my-2">
                                <li>
                                    <h5>
                                        <a href='checkout.php' class="text-decoration-none"><i class='fa fa-crosshairs'></i> Checkout</a>
                                    </h5>
                                </li>
                                <li>
                                    <h5><a href="cart.php" class="text-decoration-none mx-5"><i class="fa fa-shopping-cart"></i> Cart
                                        </a>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown mx-5">
                        <button style="font-size: 15px;" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo "Welcome! - " . $_SESSION['user']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 15px;">
                            <li><a class="dropdown-item" href="details.php"><i class="fa fa-address-card" aria-hidden="true"></i> Address details</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="_orderdetails.php"><i class="fa fa-first-order" aria-hidden="true"></i> My Order</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="_returnhistory.php"><i class="fa fa-truck" aria-hidden="true"></i> Return Order</a></li>


                        </ul>
                    </div>
                    <a style="font-size: 15px;" href="logout.php" class="btn btn-primary mx-2"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585Ach3>9TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>