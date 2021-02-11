<?php
include "config.php";
include ("model.php");
include ("members_model.php");
include "Controller.php";

$x = new Controller();
//echo(  $x -> hello_user());
var_dump ($x->change_password());
