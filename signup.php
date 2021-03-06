<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";
if ($_POST){
	$email = $_POST["get_username"];
	$password = md5( $_POST["get_password"]);
	$fname =  $_POST["get_fname"];
	$lname =  $_POST["get_lname"];
	$phone =  $_POST["phone_number"];
	$new_user = new Controller();
	$added = $new_user -> add_user ($email, $password, $fname, $lname, $phone);
	if($added){
		setcookie("username",$email, time()+600);
		setcookie("password",$password, time()+600);
		echo "Thanks for your signup, if you want to continue, <a href='http://localhost/test/login/login/index.php/'> Click here! </a>";
		header('Location: http://localhost/test/login/login/index.php');
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
	  <form action="#" method="POST">
	  <body style="background-color:black;">
	  <br>
	  <DIV>
	  <label for="username">Username:</label>
	  <input type="text" id="get_username" name="get_username" placeholder="Username"><br>
	  <label for="password">Password:</label>
	  <input type="password" id="get_password" name="get_password" placeholder="Password"><br>
	  <label for="fname">First Name:</label>
	  <input type="text" id="get_fname" name="get_fname" placeholder="First Name"><br>
	  <label for="lname">Last Name:</label>
	  <input type="text" id="get_lname" name="get_lname" placeholder="Last Name"><br>
	  <label for="phone_number">Phone number:</label>
	  <input type="number" id="phone_number" name="phone_number" placeholder="Cell phone"><br>
	  
	  <br>
	  <input type="submit" value="Signup">
	  <br>
	  </DIV>
	</form>'
	);
}
