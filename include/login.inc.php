<?php

if(isset($_POST["submit"])) {
    // grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($username, $password);

    // running error handlers and user signup
    $login->login_user();

    // going back to front page
    header("Location: ../dashboard.php?error=none");
}