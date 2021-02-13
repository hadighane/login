<?php
class Controller
{	
	/*
	function __construct(){
		$user = new members();
	}
	*/
	function find_username() 
	{
		$user = new members();
		return $user->find_user("ce.negro@yahoo.com", "47047");
	}
	
	function get_username(){
		$ret = $this->find_username();
		return $ret[0]['email'];
	}
	
	function hello_user(){
		return "Hello " . $this->get_username(); 
	}
	
	function change_password(){
		$email = "ce.negro@yahoo.com";
		$old_password = "123456";
		$new_password = "47047";
		$user = new members();
		return $user->change_password($email, $new_password, $old_password);
	}
	function delete_user(){
		$email = "info@applyforum.ir";
		$password = "47047";
		$user = new members();
		return $user->delete_user($email, $password);
	}
	function add_user(){
		$email = "info@applyforum";
		$password = "47047";
		$user = new members();
		return $user->add_user($email, $password);
	}
}