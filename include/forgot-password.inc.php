<?php


if(isset($_POST["submit"])) {
    // grabbing the data from input field on website
    $email = $_POST["email"];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/email-sender.classes.php";

    # send email verification
    $email_sender = new EmailSender($email);
    $email_sender->send_email_reset_password();

    // going back to front page
    header("Location: ../login.php?error=reset-password-sent");
}