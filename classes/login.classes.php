<?php

// login.classes.php
// handle login query inside database

class Login extends Dbh {

	protected function get_user($username, $password) {
        $stmt = $this->connect()->prepare("SELECT password FROM account WHERE username = ?;");

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("Location: ../index.php?error=stmt-failed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../index.php?error=user-not-found");
            exit();
        }

        // fetch data from database
        // PDO::FETCH_ASSOC >> return multidimensional array with dictionary
        $password_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_password = password_verify($password, $password_hashed[0]["password"]);

        if($check_password == false) {
            $stmt = null;
            header("Location: ../index.php?error=password-wrong");
            exit();
        } else if($check_password == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM account WHERE username= ?;");
            if(!$stmt->execute(array($username))) {
                $stmt = null;
                header("Location: ../index.php?error=stmt-failed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../index.php?error=user-not-found");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["uid"] = $user[0]["uid"];
            $_SESSION["username"] = $user[0]["username"];

        }

        $stmt = null;
    }

}