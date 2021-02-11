<?php
class members extends model{
	
	function find_user($email)
	{
		$TableName = "members";
		$ColumnNames = [];
		$Wheres = ["email =" => $email];
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
		
}