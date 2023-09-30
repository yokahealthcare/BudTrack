<?php
	
class SignupContr {
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

	# check for empty field
	private function empty_input() {
		$result;
		if (empty($this->name) || empty($this->username) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}

	# check for invalid username
	private function invalid_username() {
		$result;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	# check for password match
	private function password_match() {
		$result;
		if ($this->password !== $this->password_repeat) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}
}
