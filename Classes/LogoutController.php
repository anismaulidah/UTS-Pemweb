<?php

class LogoutController{
	public function Logout(){
		session_start();
		session_destroy();
		header('location:login.php');
	}
}

?>