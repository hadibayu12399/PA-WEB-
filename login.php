<?php
define('LOGIN', 'LOGIN');

include ('session.php');
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LOGIN::INSAPRA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="icon" href="assets/img/favicon (7).ico" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="nav-header">
	<a href="#" class="nav-logo"><img src="assets/img/LOGONAV.PNG"></a>
	<a href="login.php" class="nav-log"><i class="fa  fa-arrow-circle-right "></i>&nbsp;&nbsp;Login / Masuk</a>
	</div>
	<section>
		<div class="background">
			<img src="assets/img/logo insapra.png">
		<form method="POST">
			<div class="form-input">
				<input type="text" name="username" id="username" placeholder="Username">
			<div class="form-input">
				<input type="password" name="password" id="password" placeholder="Password">
			</div>
			<button type="submit" name="login"><i class="fa fa-sign-in"></i>&nbsp;Masuk</button>
		</form>
		</div>
	</section>
	
</body>
</html>