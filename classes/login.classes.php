<?php
/*
 * login.classes.php
 * handle login query inside database
 */
class Login extends Dbh {
	protected function get_user($username, $password) {
        // query for fetching only password from database
        $stmt = $this->connect()->prepare("SELECT password FROM account WHERE username = ?;");

        // execute the query
        // with check, if failed
        // user get redirected to login.php
        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../login.php?error=stmt-failed");
            exit();
        }

        // checking for user not registered on database
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../login.php?error=user-not-found");
            exit();
        }


        // fetch data from database
        // PDO::FETCH_ASSOC >> return multidimensional array with dictionary
        /*
         * explanation:
         * $password_hashed[0]["password"]  => first row, password column
         */
        $password_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_password = password_verify($password, $password_hashed[0]["password"]);

        // checking password is correct or not
        // if not, redirect user to login.php
        if(!$check_password) {
            $stmt = null;
            header("Location: ../login.php?error=password-wrong");
            exit();
        }

        // check if the email that is connected is verified or not
        // checking for user not registered on database
        if($this->check_email_verification($username)) {
            $stmt = null;
            header("Location: ../login.php?error=email-has-not-been-verified");
            exit();
        }

        // fetch all account information from database using username
        $stmt = $this->connect()->prepare("SELECT * FROM account WHERE username= ?;");

        // execute the query
        // with check, if failed
        // user get redirect to login.php
        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../login.php?error=stmt-failed");
            exit();
        }

        // if none error occurs
        // then, fetch all data of user from database
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // store user data on $_SESSION
        session_start();
        $_SESSION["uid"] = $user[0]["uid"];
        $_SESSION["name"] = $user[0]["name"];
        $_SESSION["username"] = $user[0]["username"];
        $_SESSION["email"] = $user[0]["email"];

        $stmt = null;
    }

    /*
     * check_email_verification()
     * check if their email has been verified or not
     */
    protected function check_email_verification($username) {
        // Query to select the 'verified' column for the provided email
        $stmt = $this->connect()->prepare("SELECT verified FROM account WHERE username = ?;");

        // Execute the query
        if (!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        // Fetch the 'verified' column value
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the 'verified' column is 1
        return !($result['verified'] == 1);
    }

}