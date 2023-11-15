<?php
class EmailVerification extends Dbh
{
    private $uid;
    public function __construct($input_uid) {
        // define value of private variable
        $this->uid = $input_uid;
    }

    /*
     * verified_email()
     * update verified column on database
     * it need 1 argument (uid)
     */
    public function verified_email()
    {
        // query for updating verification data
        $stmt = $this->connect()->prepare("UPDATE account SET verified=1 WHERE uid=?;");

        // execute query
        // with check, if failed
        // when it failed, user get redirected to signup.php
        if (!$stmt->execute(array($this->uid))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }
}