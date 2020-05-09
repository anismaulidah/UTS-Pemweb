<?php

require 'Classes\LogoutController.php';

if(isset($_POST['logout'])){
	$logout = new LogoutController();
	$logout->Logout();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div class="container">
		<div>
			<div>
				<h1>Hello!</h1>
				<br>
				<form method="post" action="dashboard.php">
					<input type="submit" name="logout" value="Logout" class="button">
				</form>
			</div>
		</div>
	</div>
</body>
</html>