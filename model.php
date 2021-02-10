<?php
class model{
	function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn;
		try {
		  $this->conn = new PDO("mysql:host=$servername;dbname=site2", $username, $password);
		  // set the PDO error mode to exception
		  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  //echo "Connected successfully";
		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
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
		return $insert_query->fetchall();
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
		$update_query = $this->conn->prepare($query);
		$update_query -> execute();
		return $update_query->fetchall();
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
		return $delete_query->fetchall();
	}
}
