<?php
/*
 * password-updater-contr.classes.php
 * handle flow of password update for forgot password feature
 */
class PasswordUpdaterContr extends PasswordUpdater {
    // define private variable
    private $uid;
    public function __construct($input_uid) {
        // define the private variable
        $this->uid = $input_uid;
    }

    /*
     * password_user()
     * update user password from database
     */
    public function password_user($new_password) {
        // write user to database
        $this->update_password($this->uid, $new_password);
    }
}
