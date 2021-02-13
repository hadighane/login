<?php
class members extends model{
	
	function find_user($email, $password)
	{
		$TableName = "members";
		$ColumnNames = [];
		$password = md5($password);
		$Wheres = ["email =" => $email, "password =" => $password];
		$query = $this-> select($TableName,$ColumnNames,$Wheres);
		return $query;
	}
	function valid_pass($email, $password)
	{
		$TableName = "members";
		$ColumnNames = ["email", "password"];
		$Wheres = ["email =" => $email , "password =" => md5($password)];
		$query = $this->select($TableName, $ColumnNames, $Wheres);
		if(count($query)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function change_password($email, $new_password, $old_password)
	{
		if($this->valid_pass($email, $old_password))
		{
			$TableName = "members";
			$ColumnNames = ["password"];
			$password = md5($new_password);
			$Values = [$password];
			$Wheres = ["email" => $email];
			$query = $this->update($TableName,$ColumnNames,$Values,$Wheres);
			return $query;
		}
		else{
			echo "Your old password is wrong";
		}
	}
	function delete_user($email, $password)
	{
		if ($this->valid_pass($email, $password))
		{
			$TableName = "members";
			$password = md5($password);
			$Wheres = ["email" => $email, "password" => $password];
			$query = $this->delete($TableName, $Wheres);
			return $query;
		}
		else{
			echo "Username or password is invalid.";
		}
	}
	function add_user($email, $password)
	{
		$TableName = "members";
		$password = md5($password);
		$lastlogin = time();
		$lastip = $_SERVER["REMOTE_ADDR"];
		$ColumnNames = ["email", "password"];
		$Values = [$email, $password];
		$query = $this->insert($TableName, $ColumnNames, $Values);
		return $query;
	}		
}