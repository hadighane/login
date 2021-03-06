<?php

class Controller extends members
{	

	function find_users($email, $password) 
	{
		//$user = new members();
		$query = $this->valid_user($email, $password);
		if ($query){
			return true;
		}else{
			return 0;
		}
	}
	
	function get_username($email, $password){
		$ret = $this->find_user($email, $password);
		return $ret[0]['email'];
	}
	
	function hello_user($email, $password){
		return "Hello " . $this->get_username($email, $password); 
	}
	
	function get_user($email, $phone){
		$ret = $this->find_user($email, $phone);
		//return $ret[0]['email'];
		if ($ret){
			return true;
		}
	}
	function forget_password($email, $new_password){
		$user = new members();
		return $user->forget_password($email, $new_password);
	}
	/*function change_password(){
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
	} */
	function add_user($email, $password, $fname, $lname, $phone){
		$user = new members();
		return $user->add_user($email, $password, $fname, $lname, $phone);
	}
}