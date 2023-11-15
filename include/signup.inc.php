<?php
/*
 * signup.inc.php
 * handle signup communication from website to server codebase
 */

if(isset($_POST["submit"])) {
	// grabbing the data from input field on website
	$name = $_POST["name"];
	$username = $_POST["username"];
    $email = $_POST["email"];
	$password = $_POST["password"];
	$password_repeat = $_POST["password_repeat"];

    // import necessary modules
	include "../classes/dbh.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";

    // create new object of signup controller
	$signup = new SignupContr($name, $username, $email, $password, $password_repeat);

	// register the user
	$signup->signup_user();

	// going back to front page
	header("Location: ../login.php?error=none");
}