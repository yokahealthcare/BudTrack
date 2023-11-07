<?php
/*
 * transaction.inc.php
 * handle transaction communication from website to server codebase
 */

if(isset($_POST["submit"])) {
    // grabbing the transaction data from input field on website
    $title = $_POST["title"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $account = $_POST["account"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];
    $status = $_POST["status"];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/transaction-contr.classes.php";

    // create new object of transaction controller
    $transaction = new TransactionContr($title, $date, $type, $account, $category, $amount, $status);

    // register the new user transaction
    $transaction->transaction_user();

    // going back to front page
    header("Location: load-transaction.inc.php?type=analysis");
}