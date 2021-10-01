<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="CSS/Login.css">
</head>
<?php
	session_start();
	if(isset($_POST['LogOut'])){
	session_destroy();
	}
?>
<body>
	<center>
		<div id="FormLogin">
			<h1>Student Login</h1>
			<form action="IndexDisplay.php" method="POST">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" required>
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" required>
				<input type="submit" name="login" value="Login">
			</form>
			<a href="IndexRegistration.php">Don't have a Student Account</a>
		</div>
	</center>
</body>
</html>