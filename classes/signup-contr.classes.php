<?php
/*
 * signup-contr.classes.php
 * handle flow of signup data
 */
class SignupContr extends Signup {
    // define private variable
	private $name;
	private $username;
	private $password;
	private $password_repeat;

	public function __construct($input_name, $input_username, $input_password, $input_password_repeat) {
        // define the private variable
		$this->name = $input_name;
		$this->username = $input_username;
		$this->password = $input_password;
		$this->password_repeat = $input_password_repeat;
	}

    /*
     * singup_user()
     * register new user to database
     *
     * STEPS:
     * 1. check for input error
     *      - empty input
     *      - invalid username / taken username
     *      - password match
     * 2. register the user to database
     */
	public function signup_user() {
		// checking empty input
        // if failed, redirect user to signup.php
		if(!$this->empty_input()) {
			header("Location: ../signup.php?error=empty-input");
			exit();
		}

        // checking invalid username
        // if failed, redirect user to signup.php
		if(!$this->invalid_username()) {
			header("Location: ../signup.php?error=invalid-username");
			exit();
		}

        // checking password match
        // if failed, redirect user to signup.php
		if(!$this->password_match()) {
			header("Location: ../signup.php?error=password-not-match");
			exit();
		}

        // checking username is taken or not
        // if failed, redirect user to signup.php
		if(!$this->username_taken_check()) {
			header("Location: ../signup.php?error=username-taken");
			exit();
		}

        // write user to database
		$this->new_user($this->name, $this->username, $this->password);
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
