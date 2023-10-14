<?php
// signup-contr.classes.php
// handle flow of signup data

class SignupContr extends Signup {
	private $name;
	private $username;
	private $password;
	private $password_repeat;

	public function __construct($name, $username, $password, $password_repeat) {
		$this->name = $name;
		$this->username = $username;
		$this->password = $password;
		$this->password_repeat = $password_repeat;
	}

	public function signup_user() {
		// using the function "empty_input()" to check for empty field
		if(!$this->empty_input()) {
			header("Location: ../signup.php?error=empty-input");
			exit();
		}

		// using the function "invalid_username()" to check for invalid username
		if(!$this->invalid_username()) {
			header("Location: ../signup.php?error=invalid-username");
			exit();
		}

        // using the function "password_match()" to check for invalid password match
		if(!$this->password_match()) {
			header("Location: ../signup.php?error=password-not-match");
			exit();
		}

        // using the function "username_taken_check()" to check if username already taken or not
		if(!$this->username_taken_check()) {
			header("Location: ../signup.php?error=username-taken");
			exit();
		}

        # write user to database
		$this->set_user($this->name, $this->username, $this->password);
	}

	# check for empty field
	private function empty_input() {
        $result = null;
		if (empty($this->name) || empty($this->username) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}

	# check for invalid username
	private function invalid_username() {
        $result = null;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	# check for password match
	private function password_match() {
        $result = null;
		if ($this->password !== $this->password_repeat) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	# check for username taken or not
	private function username_taken_check() {
        $result = null;
		if (!$this->check_user($this->username)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}
}
