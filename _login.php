<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($con, $_POST['txtEmail']);
    $password = mysqli_real_escape_string($con, $_POST['txtPassword']);

    $sql = "SELECT * FROM tbl_register WHERE email_add = '$email' AND verification='done'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['status'];
            $pass = $row['password'];
            $cust_id = $row['cust_id'];
            $user_name = $row['user_name'];
            if ($status == 1) {
                if (password_verify($password, $pass)) {
                    session_start();
                    $_SESSION['email_add'] = $email;
                    $_SESSION['id'] = $cust_id;
                    $_SESSION['user'] = $user_name;
                    header("location: _index.php");
                } else {
                    // $showError1 = "Invalid Credentials";
                    // echo '<div style="margin-bottom: 0px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    // <strong>Error! </strong>' . $showError1 . '
                    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //     <span aria-hidden="true">&times;</span>
                    // </button>
                    // </div>';
                }
            } else {
                $showError2 = "Your account has been blocked";
                echo '<div style="margin-bottom: 0px;" class="alert alert-danger alert-dismissible fade show " role="alert">
                    <strong>Error! </strong>' . $showError2 . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
        }
    } else {
        // $showError3 = "Invalid Credentials";
        // echo '<div style="margin-bottom: 0px;" class="alert alert-danger alert-dismissible fade show " role="alert">
        //             <strong>Error! </strong>' . $showError3 . '
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //             </div>';
    }
}


?>






<!-- Modal -->
<div class="modal fade" id="loginmodel" tabindex="-1" aria-labelledby="loginmodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodelLabel">Login to Your Account</h5>
                <h3 class="my-2"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="login" name="login">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
                    </div>
                    <div class="d-flex">
                        <p style="text-decoration: none;font-size:15px;">Forgot Your Password?
                            <a href="_recover.php" style="text-decoration: none;font-size:15px;margin-top: 25px;">Click Here</a>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="modal-footer">
                <!-- <a href="" style="text-decoration: none; padding-right: 100px;" data-bs-toggle="modal" data-bs-target="#signupmodel">Create new account</a> -->
                <p style="text-decoration: none;font-size:15px;padding-right: 60px;">Not Have an account?
                    <a href="" style="text-decoration: none; color:blue;font-size:15px;" data-bs-toggle="modal" data-bs-target="#signupmodel">SignUp Here</a>
                </p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php

include "_signup.php";

?>