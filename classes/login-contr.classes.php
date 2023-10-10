<?php

// login-contr.classes.php
// handle flow of login data

class LoginContr extends Login {
	private $username;
	private $password;

	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	# check for empty field
	public function login_user() {
		// using the function "empty_input()" to check for empty field
		if(!$this->empty_input()) {
			header("Location: ../index.php?error=empty-input");
			exit();
		}

        # write user to database
		$this->get_user($this->username, $this->password);
	}

	# check for empty field
	private function empty_input() {
        $result = null;
		if (empty($this->username) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}
}
