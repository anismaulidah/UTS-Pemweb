<?php

require 'Database\Query.php';

class RegisterController extends Query{

	protected $name;
	protected $email;
	protected $password;
	protected $confirm_password;
	public $message;

	public function getData($name, $email, $password, $confirm_password){

		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->confirm_password = $confirm_password;

		return $this->validateData();
	}

	public function validateData(){
		if(empty($this->name) || empty($this->email) || empty($this->password) || empty($this->confirm_password)){
			$this->message = 'Semua data dibutuhkan!.';
			return $this->message;
			header('location:register.php');
		}elseif ($this->password != $this->confirm_password) {
			$this->message = 'Konfirmasi password anda salah!.';
			return $this->message;
			header('location:register.php');
		}else{
			return $this->Register();
		}
	}

	public function Register(){
		$row = $this->ValidateEmail($email)->FetchArray();
		if ($row['email'] == $this->email) {
			$this->message = 'Email yang anda masukkan sudah pernah digunakan!.';
			return $this->message;
			header('location:register.php');
		}else{
			$sql = $this->SQLRegister($this->name, $this->email, $this->password);
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];
			header('location:dashboard.php');
		}
	}
}

?>