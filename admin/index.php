<?php
    session_start();
	if(isset($_SESSION['id']))
	{
		header("location:HomePage.php");
    }
?>
<html>
<head>
	<title>Admin | Mobileshop</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
</head>
<body style="background: linear-gradient(to right, #9790d8, #33cabb) fixed;">
	 
	 <div class="main">
		<div class="login-form">
			<h1><a><img src="images/home/logoh.png" height="80" alt="" /></a></h1>
							<h1>Admin</h1>
				<form action="check.php" name="login" method="post">
						<input type="text" name="txtUsername" class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="txtPassword" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" name="login" onclick="myFunction()" value="LOGIN" >
				</form>
			</div>
		</div>
</body>
</html>

<div class="col-sm-4">
						
					</div>