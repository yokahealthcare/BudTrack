<?php
/*
 * login-contr.classes.php
 * handle flow of login data
 */
class LoginContr extends Login {
    // define private variable for username and password
	private $username;
	private $password;

	public function __construct($input_username, $input_password) {
        // define value of private variable
		$this->username = $input_username;
		$this->password = $input_password;
	}

	public function login_user() {
        // check user entered empty input
		if(!$this->empty_input()) {
			header("Location: ../login.php?error=empty-input");
			exit();
		}

        // if there is not error occurs
        // write user to database
		$this->get_user($this->username, $this->password);
	}

    /*
     * empty_input()
     * checking the private variable 'username' and 'password'
     * contain some value or not
     *
     * if yes, then return true
     * if no, then return false
     */
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