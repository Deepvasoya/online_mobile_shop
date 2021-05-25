<?php
include('connection.php');

$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
  header("location:HomePage.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>

<body>


  <nav class="navbar navbar-expand-lg" style="background-color: #346DB9;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex">
          <ul class="mb-auto" style=" margin-right: 200px;">
            <li class="nav-item dropdown">
              <?php
              $upd = "SELECT * FROM `adddeatails` WHERE order_status = 'New' ORDER BY aid ASC";
              $result = mysqli_query($con, $upd);
              $num = mysqli_num_rows($result);
              $i = 1;


              ?>



              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell fa-10x" style="color: white;font-size: 35px;"></i>
                <span class="badge" style="display: inline-block;position: absolute;top: 2px;right: 10px; background-color: #f1556c;"><?php echo $num; ?></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="width: 300px;">
                <h3 class="m-0 text-center text-primary"><span class="float-right"> </span>Notification</h3>
                <hr>
                <?php
                if ($num > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $oid = $row["ordersid"];
                    $cid = $row["c_id"];

                    $upd1 = "SELECT * FROM `payments` WHERE orderid = '$oid'";
                    $result1 = mysqli_query($con, $upd1);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                      $item_number = $row1["item_number"];
                      $product_qty = $row1["product_qty"];
                      $dt = $row1["date"];


                      $upd2 = "SELECT * FROM `tbl_product` WHERE prod_id = '$item_number'";
                      $result2 = mysqli_query($con, $upd2);
                      while ($row2 = mysqli_fetch_assoc($result2)) {
                        $prod_name = $row2["prod_name"];

                ?>
                        <li><a class="dropdown-item" href="order_detail1.php?ordersid=<?php echo $oid; ?>&cust_id=<?php echo $cid; ?>"><?php echo $i; ?>--<i class="fa fa-truck" aria-hidden="true"></i> <?php echo $product_qty; ?> | <?php echo substr($prod_name, 0, 10); ?> | At- <?php echo substr($dt, 0, 10); ?>
                          </a></li><br>
                  <?php
                      }
                    }
                    $i++;
                  }


                  ?>
                  <hr>
                  <a href="_order.php" class="dropdown-item text-center text-primary notify-item notify-all" style="padding: 0px 0px;">
                    View all <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </a>
                <?php
                } else {
                  echo '<p align="center">No New Request found</p>';
                }
                ?>
              </ul>
            </li>
          </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>