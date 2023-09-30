<?php

if(isset($_POST["submit"])) {
	
	// grabbing the data
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password_repeat = $_POST["password_repeat"];

	// instantiate SignupContr class
	include "../class/singup.classes.php"
	include "../class/singup-contr.classes.php"

	// running error handlers and user signup

	// going back to front page

}