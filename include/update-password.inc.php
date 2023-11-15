<?php

if(isset($_POST["submit"])) {
    // grabbing the data from input field on website
    $uid = $_POST["uid"];
    $new_password = $_POST["new_password"];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/password-updater.classes.php";
    include "../classes/password-updater-contr.classes.php";

    // create new object of signup controller
    $password_update = new PasswordUpdaterContr($uid);

    // verified the user
    $password_update->password_user($new_password);

    // going back to front page
    header("Location: ../login.php?error=none");
}