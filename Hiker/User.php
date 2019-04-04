<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

class User{
	
	public $email;
	public $roles = array();
	
	
	function __construct($email){
		
		$rows = $result->num_rows;
		
		global $conn;
		
		$this->email = $email;
		
		$query = "select role from user where user_ID='$user_ID' ";
		
		$result = $conn->query($query);
		if(!$result) die($conn->error);

		$row_count = $result->num_rows;

		for($j=0; $j<$row_count; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			$role = $row[0];
			$this->roles[] = $role;
		}
	}
	
	function getRoles(){
		return $this->roles;
	}
	
	
}








?>