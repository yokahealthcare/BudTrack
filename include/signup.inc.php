<?php

if(isset($_POST["submit"])) {
	// grabbing the data
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password_repeat = $_POST["password_repeat"];

	// instantiate SignupContr class
	include "../classes/dbh.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";
	$signup = new SignupContr($name, $username, $password, $password_repeat);

	// running error handlers and user signup
	$signup->signup_user();

	// going back to front page
	header("Location: ../index.php?error=none");
}