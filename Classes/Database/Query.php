<?php

require 'Connect.php';

class Query extends Connect
{
	protected $sql;
	protected $result;

	public function SQLLogin($email, $password)
	{
		$this->sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'";
		return $this->getResult();
	}

	public function ValidateEmail($email)
	{
		$this->sql = "SELECT * FROM users WHERE email = '".$email."'";
		return $this->getResult();
	}

	public function SQLRegister($name, $email, $password)
	{
		$this->sql = "INSERT INTO users(name, email, password, created_at)"."VALUES ('".$name."', '".$email."', '".md5($password)."', NOW())";
		return $this->getResult();
	}

	public function getResult()
	{
		$this->result = $this->dbConn()->query($this->sql);
		return $this;
	}

	public function FetchArray()
	{
		$row = $this->result->fetch_array();
		return $row;
	}
}

?>