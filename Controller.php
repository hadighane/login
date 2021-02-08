<?php
include ("model.php");
class Controller
{
	function find_username()
	{
		$email = "ce.negro@yahoo.com";
		$TableName = "members";
		$ColumnNames=[];
		$Wheres = ["email =" => $email];
		$db = new model();
		$query = $db -> select($TableName,$ColumnNames,$Wheres);
		return $query;
		
	}
	
	function get_username(){
		$ret = $this->find_username();
		return $ret[0]['email'];
	}
	
	function hello_user(){
		return "Hello " . $this->get_username(); 
	}
	
}




$user = new Controller();
echo  $user -> hello_user();
