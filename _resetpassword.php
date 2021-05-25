<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Mobile Shop</title>
</head>

<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">

    <?php
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("connection.php");
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];

        if ($newpassword == $cpassword) {
            $hash1 = password_hash($newpassword, PASSWORD_DEFAULT);
            $hash2 = password_hash($cpassword, PASSWORD_DEFAULT);


            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $sql = "UPDATE `tbl_register` SET `password`='$hash1',`confirm_password`='$hash2'WHERE token='$token'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                }
            }
        } else {
            $showError = "Passwords do not match";
        }
    }





    ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your password has been reset successfully! 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>' . $showError . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>


    <div class="col-4 container bg-info  mb-3" style="margin-top: 250px;">
        <div class="my-5 bg-warning text-center">
            <h1>Reset Password</h1>
        </div>
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">New Password*</label>
                <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password..." required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password*</label>
                <input type="password" name="cpassword" class="form-control" placeholder="Enter Repeat Password..." required>
            </div>
            <button type="submit" class="btn btn-success mb-4">Update Password</button>
            <div class="mb-5 text-center my-3">
                <p style="text-decoration: none;font-size:20px;">Back to
                    <a href="first.php" style="text-decoration: none; color:white;font-size:20px;">Sign In</a>
                </p>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>