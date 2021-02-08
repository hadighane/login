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

}
