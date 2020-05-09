<?php

require 'Classes\RegisterController.php';
session_start();

if(isset($_POST['submit'])){
	$register = new RegisterController();
	$register->getData($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm-password']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran</title>
</head>
<body>
	<div class="container">
		<div>
			<div>	
				<?php
					if(isset($_POST['submit'])){
						echo "<div class='alert alert-danger text-center' role='alert'>
						'".$register->message."'
						</div>";
					}
				?>
				<h1 class="text-center text-light">Daftar Disini!</h1>
				<form method="post" action="register.php">
					<div class="form-group">
						<input type="text" name="name" placeholder="Name">
					</div>

					<div class="form-group">
						<input type="email" name="email" placeholder="Email">
					</div>

					<div class="form-group">
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" name="confirm-password" placeholder="Password">
					</div><br>
					<input type="submit" name="submit" value="Daftar" class="button">
				</form>
				<div class="text-center">
					<a href="login.php" class="text-light">Anda sudah mempunyai akun?</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>