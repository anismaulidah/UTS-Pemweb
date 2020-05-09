<?php

require 'Database\Query.php';

class LoginController extends Query{

	protected $name;
	protected $email;
	protected $password;
	protected $confirm_password;
	public $message;

	public function getData($email, $password, $remember){

		$this->email = $email;
		$this->password = $password;
		$this->remember = $remember;

		return $this->validateData();
	}

	public function validateData(){

		if(empty($this->email) || empty($this->password)){
			$this->message = "Email dan Password belum diisi.";
			return $this->message;
			header('location:login.php');
		}else{
			return $this->Login();
		}
	}

	public function Login(){
		$row = $this->SQLLogin($this->email, $this->password)->FetchArray();
		if($row['email'] == $this->email || $row['password'] == md5($this->password)){
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];

			$time = time() + (86400 * 30);
			if(empty($this->remember)){
				setcookie('email', $this->email, $time);
				setcookie('password', $this->password, $time);
			}else{
				setcookie('email', '');
				setcookie('password', '');
			}
			header('location:dashboard.php');
		}else{
			$this->message = "Email atau Password anda salah.";
			return $this->message;
			header('location:login.php');
		}
	}


}

?>