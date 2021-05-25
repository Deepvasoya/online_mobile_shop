<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .sidebar {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #346DB9;
            overflow-x: hidden;
            padding-top: 16px;
        }

        .sidebar a {
            padding: 10px 30px 6px 60px;
            text-decoration: none;
            font-size: 20px;
            color: #f1f1f1;
            display: block;
        }

        .sidebar img {
            margin: 10px 10px 10px 100px;
        }

        .sidebar h1 {
            margin: 30px 10px 50px 60px;
            color: #f1f1f1;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }



        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;

            }

            .sidebar a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <img src="images/home/logoh.png" alt="" width="100" height="60">
        <h1><i class="fa fa-user-circle-o"></i>Admin</h1>
        <a href="HomePage.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
        <a href="cp_detail.php"> <i class="fa fa-sitemap" aria-hidden="true"></i> Company</a>
        <a href="product_detail.php"><i class="fa fa-fw fa-user"></i> Product</a>
        <a href="_order.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Orders</a>
        <a href="_returnorders.php"><i class="fa fa-truck" aria-hidden="true"></i> Return Orders</a>
        <a href="register_detail.php"><i class="fa fa-users"></i> Users</a>
        <a href="feedback_detail.php"><i class="fa fa-fw fa-envelope"></i> Feedback</a>
        <a href="change_password.php"><i class="fa fa-fw fa-wrench"></i> Change Password</a>
        <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</body>

</html>