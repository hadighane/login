<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";

$x = new Controller();
echo(  $x -> hello_user());
//$x->change_password();
//$x->delete_user();
//$x->add_user();