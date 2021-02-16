<?php
class dbcore{
function connection(){
$servername = "localhost";
$username = "root";
$password = "";
try {
		  $conn = new PDO("mysql:host=$servername;dbname=site2", $username, $password);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
		return $conn;
	}
}
