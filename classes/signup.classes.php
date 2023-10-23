<?php
/*
 * signup.classes.php
 * handle signup query inside database
 */
class Signup extends Dbh {
    /*
     * new_user()
     * write new user to database
     * it need 3 arguments (name, username, password)
     */
	protected function new_user($name, $username, $password) {
        // query for inserting new data to database
		$stmt = $this->connect()->prepare("INSERT INTO account (uid, name, username, password) VALUES(?, ?, ?, ?);");

        // generate new unique user ID
		$uid = uniqid();
        // hashing the password before wrote it to database
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // execute query
        // with check, if failed
        // when it failed, user get redirected to signup.php
		if(!$stmt->execute(array($uid, $name, $username, $hashed_password))) {
			$stmt = null;
			header("Location: ../signup.php?error=stmt-failed");
			exit();
		}

		$stmt = null;
	}

    /*
     * check_user()
     * check if their same username exists on database
     */
	protected function check_user($username) {
        // query for selecting only the username using username :)
        $stmt = $this->connect()->prepare("SELECT username FROM account WHERE username = ?;");

        // execute query
        // with check, if failed
        // when it failed, then user get redirected to signup.php
        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        // checking for the number of row it retrieved
        // if more than 0, return false
        // if 0, return true
		if($stmt->rowCount() > 0) {
			$result_check = false;
		} else {
			$result_check = true;
		}

		return $result_check;
	}
}