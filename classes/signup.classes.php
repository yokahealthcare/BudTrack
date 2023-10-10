<?php

// signup.classes.php
// handle query inside database

class Signup extends Dbh {

	protected function set_user($name, $username, $password) {
		$stmt = $this->connect()->prepare("INSERT INTO account (uid, name, username, password) VALUES(?, ?, ?, ?);");
		
		$uid = uniqid();
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if(!stmt->execute(array($uid, $name, $username, $password))) {
			$stmt = null;
			header("Location: ../index.php?error=stmt-failed");
			exit();
		}

		$stmt = nul;
	}

	protected function check_user($username) {
		$stmt = $this->connect()->prepare("SELECT username FROM account WHERE username = ?;");

		// check command succes executing
		if(!$stmt->execute(array($username))) {
			$stmt = null;
			header("Location: ../index.php?error=stmtfailed");
			exit();
		}

		// check if there same username exists
        $result_check;
		if($stmt->rowCount() > 0) {
			$result_check = false;
		} else {
			$result_check = true;
		}

		return $result_check;
	}

}