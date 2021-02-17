<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";
if ($_POST){
	$email = $_POST["get_username"];
	$phone =  $_POST["phone_number"];
	$user = new Controller();
	$new_password = $user -> get_user ($email, $phone);
	if($new_password){
		setcookie("username",$email, time()+600);
	}
}else{
	echo (
	  '<style>
	  div {
	  border: 3px solid yellow;
	  margin-top: 5%;
	  margin-right: 40%;
	  margin-left: 40%;
	  padding: 30px;
	  background-color: white;
	  }
	  </style>
	  <form action="http://localhost/test/login/login/newpass.php" method="POST">
	  <body style="background-color:black;">
	  <br>
	  <DIV>
	  <label for="username">Username:</label>
	  <input type="text" id="get_username" name="get_username" placeholder="Username"><br>
	  <label for="phone_number">Phone number:</label>
	  <input type="number" id="phone_number" name="phone_number" placeholder="Cell phone"><br>
	  
	  <br>
	  <input type="submit" value="Set new Password">
	  <br>
	  </DIV>
	</form>'
	);
}
