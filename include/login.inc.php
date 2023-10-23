<?php
/*
 * login.inc.php
 * handle login communication from website to server codebase
 */
if(isset($_POST["submit"])) {
    // grabbing the data from input field from website
    $username = $_POST["username"];
    $password = $_POST["password"];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    // create new object of login controller
    $login = new LoginContr($username, $password);

    // logging in the user
    $login->login_user();

    // going back to front page
    header("Location: ../dashboard.php?error=none");
}