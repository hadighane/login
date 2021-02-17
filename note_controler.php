<?php
class note extends model{
	function add_note($email, $title, $note)
	{
		$TableName = "notebook";
		$members_id = $this->get_id($email);
		$ColumnNames = ["members_id", "email", "title", "note"];
		$Values = [$members_id, $email, $title, $note];
		$query = $this->insert($TableName, $ColumnNames, $Values);
		if ($query){
			return true;
		}else{
			return false;
		}
	}
	function get_id ($email)
	{
		$TableName = "members";
		$ColumnNames = ["id"];
		$Wheres = ["email =" => $email];
		$member = $this-> select($TableName,$ColumnNames,$Wheres);
		$member_id = $member[0]["id"];
		return $member_id;
	}
	function get_note ($members_id)
	{
		$TableName = "notebook";
		$ColumnNames = ["title", "note"];
		$Wheres = ['members_id =' => $members_id];
		$note = $this->select($TableName,$ColumnNames,$Wheres);
		return $note;
	}
}