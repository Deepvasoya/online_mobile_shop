<?php
include('connection.php');
session_start();

if ($_SESSION["user"] != "") {

	require 'item.php';

	//save new order
	$custid = $_SESSION['id'];


	//$class = "Item";
	//$obj = new $class();

	$qry = "insert into tbl_order(name, cust_id) values ('new Item', '.$custid.')";
	mysqli_query($con, $qry);

	$ordersid = mysqli_insert_id($con);
	$money = $_POST['product_total'];
	$qti = $_POST['product_qty'];
	$pid = $_POST['product_id'];

	$buy = "INSERT INTO `payments`(`cid`, `orderid`, `item_number`, `product_qty`,`transaction_id`, `payment_gross`, `payment_status`) VALUES ('$custid','$ordersid','$pid','$qti','Null','$money','credit')";
	mysqli_query($con, $buy);




	$fname = $_POST['txtFName'];
	$lname = $_POST['txtLName'];
	$address = $_POST['txtAdd'];
	$zipcode = $_POST['txtZip'];
	$country = $_POST['txtCountry'];
	$state = $_POST['txtState'];
	$city = $_POST['txtCity'];
	$phoneno = $_POST['txtPhno'];
	$pfname = $_POST['PtxtFName'];
	$plname = $_POST['PtxtLName'];
	$paddress = $_POST['PtxtAdd'];
	$pzipcode = $_POST['PtxtZip'];
	$pcountry = $_POST['PtxtCountry'];
	$pstate = $_POST['PtxtState'];
	$pcity = $_POST['PtxtCity'];
	$pphoneno = $_POST['PtxtPhno'];

	$query = "insert into adddeatails(ordersid,fname,lname,address,zipcode,country,state,city,phoneno,pfname,plname,paddress,pzipcode,pcountry,pstate,pcity,pphoneno,order_status,c_id) values ('$ordersid','$fname','$lname','$address','$zipcode','$country','$state','$city','$phoneno','$pfname','$plname','$paddress','$pzipcode','$pcountry','$pstate','$pcity','$pphoneno','NEW','$custid')";
	$res1 = mysqli_query($con, $query);


	$cart = unserialize(serialize($_SESSION['cart']));
	for ($i = 0; $i < is_countable($cart); $i++) {
		mysqli_query($con, 'insert into orderdetails(prod_id,ordersid,price,quantity) values (' . $cart[$i]->prod_id . ',' . $ordersid . ',' . $cart[$i]->price . ',' . $cart[$i]->quantity . ')');
	}

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt(
		$ch,
		CURLOPT_HTTPHEADER,
		array(
			"X-Api-Key:test_f95508c7ff3dc44e5240321ee4c",
			"X-Auth-Token:test_6a29ac898bb6e073597e3c1ed8a"
		)
	);
	$payload = array(
		'purpose' => 'Payment to Mob-Shop',
		'amount' => $_POST['product_total'],
		'phone' => $phoneno,
		'buyer_name' => $fname,
		'redirect_url' => 'http://localhost/online_mobile_shop/success.php',
		'send_email' => true,
		'send_sms' => true,
		'email' => 'mobshop@example.com',
		'allow_repeated_payments' => false
	);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
	$response = curl_exec($ch);
	curl_close($ch);

	$response = json_decode($response);
	$_SESSION['TID'] = $response->payment_request->id;
	$_SESSION['oid'] = $ordersid;
	header('Location: ' . $response->payment_request->longurl);



	//Clear all product in cart
	unset($_SESSION['cart']);
} else {
	header("location:first.php");
}
