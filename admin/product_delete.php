
<?php
include("connection.php");
$id = $_GET['id'];
mysqli_query($con, "delete from tbl_product where prod_id = $id");

header("location:product_detail.php");
?>