<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $FName = $_POST['txtFName'] ?? "";
    $LName = $_POST['txtLName'] ?? "";
    $UName = $_POST['txtUName'] ?? "";
    $Email = $_POST['txtEmail'] ?? "";
    $Gender = $_POST['selGender'] ?? "";
    $Country = $_POST['txtCountry'] ?? "";
    $State = $_POST['txtState'] ?? "";
    $City = $_POST['txtCity'] ?? "";
    $ZipCode = $_POST['txtZipCode'] ?? "";
    $Password = $_POST['txtPassword'] ?? "";
    $ConfirmPassword = $_POST['txtConfirmPassword'] ?? "";
    $PhoneNo = $_POST['txtPhoneNo'] ?? "";
    $token = bin2hex(random_bytes(15));


    $emlqry = "select email_add from tbl_register where email_add='$Email'";
    $eml = mysqli_query($con, $emlqry);
    $numExistRows = mysqli_num_rows($eml);

    if ($numExistRows > 0) {
        $showError = "Email Already Use";
    } else {
        if ($Password == $ConfirmPassword) {
            $hash1 = password_hash($Password, PASSWORD_DEFAULT);
            $hash2 = password_hash($ConfirmPassword, PASSWORD_DEFAULT);

            $sql = "insert into tbl_register (first_name,last_name,user_name,email_add,gender,country,state,city,zip_code,password,confirm_password,phone_no,status,token,verification) values ('$FName','$LName','$UName','$Email','$Gender','$Country','$State','$City','$ZipCode','$hash1','$hash2','$PhoneNo','1','$token','pending')";
            $result = mysqli_query($con, $sql);

            if ($result) {

                $to_email = $Email;
                $subject = "Welcome!";
                $body = "Hi,$FName Click here to activate your account
                            http://localhost/online_mobile_shop/_activate.php?token=$token";
                $headers = "From: deepvasoya103279@gmail.com";

                if (mail(
                    $to_email,
                    $subject,
                    $body,
                    $headers
                )) {
                    $msg = "Register Successfully Click the activation link we'll sent to your"
                        . $Email . " to activate your account";
                    echo '<div style="margin-bottom: 0px;" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success! </strong>' . $msg . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                } else {
                    // echo "Email sending failed...";
                }
            }
        } else {
            $showError = "Passwords do not match";
            echo '<div style="margin-bottom: 0px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong>' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
        }
    }
}

?>


<!-- Modal -->
<div class="modal fade" id="signupmodel" tabindex="-1" aria-labelledby="signupmodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodelLabel">New User Signup!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="reg" name="reg">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input class="form-control" type="text" placeholder="First Name" name="txtFName" id="FName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input class="form-control" type="text" placeholder="Last Name" name="txtLName" id="LName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" placeholder="UserName" class="form-control" name="txtUName" id="UName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input placeholder="Email Address" class="form-control" type="email" name="txtEmail" id="Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="selGender" id="Gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input class="form-control" type="text" name="txtCountry" placeholder="Country" id="Country" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input class="form-control" type="text" name="txtState" id="State" placeholder="State" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input class="form-control" type="text" name="txtCity" id="City" placeholder="City" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Zip / Postal Code</label>
                        <input class="form-control" type="text" placeholder="Zip / Postal Code" name="txtZipCode" id="ZipCode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" placeholder="Password" name="txtPassword" id="Password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm password</label>
                        <input class="form-control" type="password" placeholder="Confirm Password" name="txtConfirmPassword" id="ConfirmPassword" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PhoneNo</label>
                        <input class="form-control" type="text" placeholder="PhoneNo" name="txtPhoneNo" id="PhoneNo" maxlength="10" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
            <div class="modal-footer">
                <p style="text-decoration: none;font-size:15px;padding-right: 60px;">Already a member?
                    <a href="login.php" style="text-decoration: none;font-size:15px;" data-bs-toggle="modal" data-bs-target="#loginmodel">Sign in</a>
                </p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>