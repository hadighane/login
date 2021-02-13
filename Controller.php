<?php
class Controller
{
	function find_username() 
	{
		$user = new members();
		return $user->find_user("ce.negro@yahoo.com");
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
		$change_pass = new members();
		return $change_pass->change_password($email, $new_password, $old_password);
	}
}