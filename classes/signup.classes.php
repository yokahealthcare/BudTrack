<?php
// signup.classes.php
// handle signup query inside database

class Signup extends Dbh {
	protected function set_user($name, $username, $password) {
        // write new user to database
		$stmt = $this->connect()->prepare("INSERT INTO account (uid, name, username, password) VALUES(?, ?, ?, ?);");
		
		$uid = uniqid();
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if(!$stmt->execute(array($uid, $name, $username, $hashed_password))) {
			$stmt = null;
			header("Location: ../signup.php?error=stmt-failed");
			exit();
		}

		$stmt = null;
	}

	protected function check_user($username) {
        // check if their same username exists on database
        $stmt = $this->connect()->prepare("SELECT username FROM account WHERE username = ?;");

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

		if($stmt->rowCount() > 0) {
			$result_check = false;
		} else {
			$result_check = true;
		}

		return $result_check;
	}
}