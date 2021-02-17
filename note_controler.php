<?php
class note extends model{
	function add_note($email, $title, $note)
	{
		$TableName = "members";
		$ColumnNames = ["id"];
		$Wheres = ["email =" => $email];
		$members = $this-> select($TableName,$ColumnNames,$Wheres);
		$members_id = $members["id"];
	
		$TableName = "notebook";
		$ColumnNames = ["members_id", "email", "title", "note"];
		$Values = [$members_id, $email, $title, $note];
		$query = $this->insert($TableName, $ColumnNames, $Values);
		if ($query){
			return true;
		}else{
			return false;
		}
	}
}