<?php

require 'Classes\LoginController.php';
session_start();
if(isset($_POST['submit'])){
	$login = new LoginController();
	if(!empty($_POST['remember'])){
		$remember = $_POST['remember'];
	}else{
		$remember = NULL;
	}
	$login->getData($_POST['email'], $_POST['password'], $remember);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div>
			<div>	
				<?php
					if(isset($_POST['submit'])){
						echo "<div class='alert alert-danger text-center' role='alert'>
						'".$login->message."'
						</div>";
					}
				?>
				<h1 class="text-center text-light">Login Disini!</h1>
				<form method="post" action="login.php">
					<div class="form-group">
						<input type="text" name="email" placeholder="Email" value="<?php
						if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>">
					</div>

					<div class="form-group">
						<input type="password" name="password" placeholder="Password" value="<?php
						if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
					</div>

					<div class="form-check">
						<input type="checkbox" name="remember" class="form-check-input" id="remember1">
						<label class="form-check-label" for="remember1">Remember Me</label>
					</div> <br>

					<input type="submit" name="submit" value="Login" class="button">
					<a href="register.php" class="button">Daftar</a>
				</form>
			</div>
		</div>
	</div>

</body>
</html>