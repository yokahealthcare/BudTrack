<?php
/*
 * transaction.inc.php
 * handle transaction communication from website to server codebase
 */

if(isset($_POST["submit"])) {
    // grabbing the transaction data from input field on website
    $tid = $_POST["tid"];
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
    include "../classes/update-transaction-contr.classes.php";

    $transaction = new UpdateTransactionContr($tid, $title, $date, $type, $account, $category, $amount, $status);
    //update the user transaction
    $execute = $transaction->updateTransaction();

    if($execute) {
        // if success, redirect to table transaction again
        header("Location: load-transaction.inc.php?type=table&error=none");
    } else {
        header("Location: load-transaction.inc.php?type=table&error=failed-to-delete");
    }
    exit();
}