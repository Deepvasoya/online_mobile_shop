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
        $email = $_POST['email'];

        $sql = "SELECT * FROM `tbl_register` where email_add='$email'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1) {
            $row = mysqli_fetch_array($result);
            $token = $row['token'];
            $user_name = $row['user_name'];
            $to_email = $email;
            $subject = "Password Reset";
            $body = "Hi, $user_name click here to reset your password.
                    http://localhost/online_mobile_shop/_resetpassword.php?token=$token";
            $headers = "From: deepvasoya103279@gmail.com";

            if (mail(
                $to_email,
                $subject,
                $body,
                $headers
            )) {
                $showAlert = true;
            } else {
                // echo "Email sending failed...";
            }
        } else {
            $showError = "No email Found";
        }
    }





    ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Check your reset password link we will sent to your ' . $email . '
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
            <h1>Forgot Password</h1>
            <p class="my-3">Enter your email and we'll send you a link to reset your password</p>
        </div>
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label" style="font-size:20px;">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email..." required>
            </div>
            <button type="submit" class="btn btn-success">Send Mail</button>
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