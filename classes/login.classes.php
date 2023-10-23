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
        } else {
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
            $_SESSION["username"] = $user[0]["username"];
        }
        $stmt = null;
    }
}