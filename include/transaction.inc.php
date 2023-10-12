<?php

if(isset($_POST["submit"])) {
    // grabbing the data
    $title = $_POST["title"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $account = $_POST["account"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];
    $status = $_POST["status"];

    // instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/transaction-contr.classes.php";
    $transaction = new TransactionContr($title, $date, $type, $account, $category, $amount, $status);

    // running error handlers and user signup
    $transaction->transaction_user();

    // going back to front page
    header("Location: ../dashboard.php?error=none");
}