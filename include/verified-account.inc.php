<?php

if(isset($_GET['uid'])) {
    $uid = $_GET['uid'];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/account-verification.classes.php";

    // create new object of signup controller
    $email_verification = new EmailVerification($uid);

    // verified the user
    $email_verification->verified_email();

    // going back to front page
    header("Location: ../login.php?error=none");
}