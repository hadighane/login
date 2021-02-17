<?php
include ("config.php");
include ("model.php");
include ("members_model.php");
include ("Controller.php");
include ("note_controler.php");

if ($_POST['submit']){
	$email = $_POST["get_username"];
	$password = $_POST["get_password"];
	$x = new Controller();
	$user = $x -> find_users($email, $password);
	if ($user){
		echo ("<p style='color:Blue'>  Dear $email , Wellcome to our website! </title><br><hr>");
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
		echo ("<p style='color:Blue'>  Dear ". $email. ", Wellcome to our website! </title><br><hr>");
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
  <form action="" method="POST" id="form1" >
  <body style="background-color:black;">
  <br>
  <DIV>
  <label for="username">Username:</label>
  <input type="text" id="get_username" name="get_username" placeholder="Username"><br>
  <label for="password">Password:</label>
  <input type="password" id="get_password" name="get_password" placeholder="Password"><br>
  
  <br>
  <input type="submit" value="Login" form="form1" name="submit">
  <br>
  <a href="http://localhost/test/login/login/signup.php/">For sign up, click here</a>
  <br>
  <a href="http://localhost/test/login/login/forgetpass.php/"> Forget Password </a>
  </DIV>
</form>'
);
if ($_POST['submit'] or $_COOKIE){
	echo (
	"<form action='' method='POST' id='form2'>
	<br>
	<label for='note_title'>Give a Title to your note:</label>
	<input type='text' id='get_title' name='get_title' placeholder='Title'><br>
	<label for='note_title'>Write your note:</label><br>
	<textarea name='paragraph_text' cols='50' rows='10'></textarea><br>
	<br>
	<input type='submit' value='Save' form='form2' name='save'>");
	if($_POST['save']){
		$x = new note();
		$new_note = $x -> add_note($email, $_POST["get_title"], $_POST["paragraph_text"]);
		if($new_note){
			echo "Your note save succefully";
		}
	}
echo "<hr>";
if ($_POST['submit']){
	$email = $_POST['get_username'];
}elseif ($_COOKIE){
	$email = $_COOKIE['username'];
}
$x = new note();
$member_id = $x -> get_id ($email);
$notes = $x -> get_note ($member_id);
foreach ($notes as $key => $value){
	if ($key = "note")
	{
		echo $value["$key"]. "<br><br>";
	}
}
}