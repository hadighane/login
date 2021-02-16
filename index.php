<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";

if ($_POST){
	$email = $_POST["get_username"];
	$password = $_POST["get_password"];
	$x = new Controller();
	$user = $x -> find_users($email, $password);
	if ($user){
		echo ("Dear ". $email. ", Wellcome to our website!");
		setcookie("username",$email, time()+600);
		setcookie("password",$password, time()+600);
	}else{
		echo ("Your username or password is invalid!");
	}
}
elseif ($_COOKIE){
	$email = $_COOKIE["username"];
	$password = $_COOKIE["password"];
	$x = new Controller();
	$x -> find_users($email, $password);
	if($x){
		echo ("Dear ". $email. ", Wellcome to our website!");
	}
	else{
		echo ("Your username or password is invalid!");
	}
}
else
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
  <form action="index.php" method="POST">
  <body style="background-color:black;">
  <br>
  <DIV>
  <label for="username">Username:</label>
  <input type="text" id="get_username" name="get_username" placeholder="Username"><br>
  <label for="password">Password:</label>
  <input type="password" id="get_password" name="get_password" placeholder="Password"><br>
  
  <br>
  <input type="submit" value="Login">
  <br>
  <a href="signup.php">For sign up, click here</a>
  <br>
  <a href="forgetpass.php"> Forget Password </a>
  </DIV>
</form>'
);