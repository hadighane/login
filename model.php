<?php
class model extends dbcore{
	public $conn;
	function __construct(){
		$conn = $this->connection(); 
		$this->conn = $conn;
	}
	function select($TableName,$ColumnNames=[],$Wheres=[])
	{
		$query = "Select ";
		if(count($ColumnNames))
		{
			foreach ($ColumnNames as $ColumnName){
				$Columns .= ($ColumnName. ", ");
			}
		}
		else{
			$Columns = "*";
		}
		
		$query .=  $Columns. " from ". $TableName;
		
		if(count($Wheres))
		{
			foreach ($Wheres as $Where_key=>$Where_Value)
			{
				if(count($Wheres)==1)
				{
					$Where_string = $Where_key. '"'. $Where_Value. '"';
				}
				else
				{
					$Where_string .= $Where_key. '"'. $Where_Value. '"'. " AND ";
				}
			}
		$query .= " Where ". $Where_string;
		}
		echo $query;
		$select_query = $this->conn->prepare($query);
		$select_query -> execute();
		return $select_query->fetchall();	
		
	}
	function insert ($TableName, $ColumnNames=[], $Values=[])
	{
		$query = "INSERT INTO ";
		if(count($ColumnNames)>1)
		{
			foreach ($ColumnNames as $ColumnName){
				$Columns .= ($ColumnName. ", ");
			}
		}
		else{
			foreach ($ColumnNames as $ColumnName){
				$Columns = $ColumnName;
			}
		}
		
		$query .=  $TableName ." (" .$Columns .") VALUES (";
		
		if(count($Values)>1){
			foreach ($Values as $Value){
				$Value_string .= ($Value. ", ");
			}
		}
		else{
			foreach ($Values as $Value){
				$Value_string = $Value;
			}
		}
		$query .= $Value_string. ")";
		$insert_query = $this->conn->prepare($query);
		$insert_query -> execute();
		
	}
	function update ($TableName,$ColumnNames=[],$Values=[],$Wheres=[])
	{
		$query = "UPDATE ". $TableName. " SET ";
		if(count($ColumnNames) > 1)
		{
			$Value = 0;
			foreach ($ColumnNames as $ColumnName){
				$set_string .= ($ColumnName. " = ". $Values[$Value]. ", ");
				$Value = $Value + 1;
			}
		}
		else {
			$set_string = $ColumnNames[0]. " = ". $Values[0]. ", ";
		}
		$query .= $set_string. " Where ";
		
		if(count($Wheres))
		{
			foreach ($Wheres as $Where_key=>$Where_Value)
			{
				if(count($Wheres)==1)
				{
					$Where_string = $Where_key. '"'. $Where_Value. '"';
				}
				else
				{
					$Where_string .= $Where_key. '"'. $Where_Value. '"'. " AND ";
				}
			}
		$query .= $Where_string;
		}
		echo $query;
		$update_query = $this->conn->prepare($query);
		return $update_query -> execute();
		
	}
	function delete ($TableName, $Wheres)
	{
		$query = "DELETE FROM ". $TableName. " WHERE ";
		if(count($Wheres))
		{
			foreach ($Wheres as $Where_key=>$Where_Value)
			{
				if(count($Wheres)==1)
				{
					$Where_string = $Where_key. '"'. $Where_Value. '"';
				}
				else
				{
					$Where_string .= $Where_key. '"'. $Where_Value. '"'. " AND ";
				}
			}
		$query .= $Where_string;
		}
		$delete_query = $this->conn->prepare($query);
		$delete_query -> execute();
	}
}
