<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";
if ($_POST){
	$email = $_COOKIE["username"];
	$password = $_POST["new_password"];
	$user = new Controller();
	$new_password = $user -> forget_password ($email, $password);
	if($new_password){
		echo "Your new password has updated...";
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
	  <form action="newpass.php" method="POST">
	  <body style="background-color:black;">
	  <br>
	  <DIV>
	  <label for="new_password">New Password:</label>
	  <input type="password" id="new_password" name="new_password" placeholder="new password"><br>	  
	  <br>
	  <input type="submit" value="Change Password">
	  <br>
	  </DIV>
	</form>'
	);
}
