<?php
session_start();
class PasswordUpdater extends Dbh
{

    /*
     * update_password()
     * update password column on database
     * it need 1 argument (uid)
     */
    public function update_password($uid, $new_password)
    {
        // query for updating verification data
        $stmt = $this->connect()->prepare("UPDATE account SET password=? WHERE uid=?;");

        // hashing the password before wrote it to database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // execute query
        // with check, if failed
        // when it failed, user get redirected to signup.php
        if (!$stmt->execute(array($hashed_password, $uid))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }
}