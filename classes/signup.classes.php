<?php
/*
 * signup.classes.php
 * handle signup query inside database
 */
// import email classes
require_once('email-sender.classes.php');
class Signup extends Dbh {
    /*
     * new_user()
     * write new user to database
     * it need 3 arguments (name, username, password)
     */
	protected function new_user($name, $username, $email, $password) {
        // query for inserting new data to database
		$stmt = $this->connect()->prepare("INSERT INTO account (uid, name, username, email, password) VALUES(?, ?, ?, ?, ?);");

        // check if username has been taken
        if($this->check_user($username)) {
            header("Location: ../signup.php?error=username-taken");
            exit();
        }

        // check if email has been taken
        if($this->check_email($email)) {
            header("Location: ../signup.php?error=email-taken");
            exit();
        }

        // generate new unique user ID
		$uid = uniqid();
        // hashing the password before wrote it to database
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // execute query
        // with check, if failed
        // when it failed, user get redirected to signup.php
		if(!$stmt->execute(array($uid, $name, $username, $email, $hashed_password))) {
			$stmt = null;
			header("Location: ../signup.php?error=stmt-failed");
			exit();
		}

        // send verification email after successfully write to database
        $this->send_verified_email($email, $uid, $name, $username);

		$stmt = null;
	}

    protected function send_verified_email($email, $uid, $name, $username) {
        /*
         * send_verification_email()
         * send verification email to user
         */
        # send email verification
        $email_sender = new EmailSender($email);
        $email_sender->send_email_verification($uid, $name, $username);
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
		return $stmt->rowCount() > 0;
	}

    /*
     * check_email()
     * check if their same email exists on database
     */
    protected function check_email($email) {
        // query for selecting only the email using email :)
        $stmt = $this->connect()->prepare("SELECT email FROM account WHERE email = ?;");

        // execute query
        // with check, if failed
        // when it failed, then user get redirected to signup.php
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        // checking for the number of row it retrieved
        // if more than 0, return false
        // if 0, return true
        return $stmt->rowCount() > 0;
    }
}