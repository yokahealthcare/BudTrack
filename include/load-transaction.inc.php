<?php
/*
 * load-transaction.inc.php
 * handle loading transaction communication from database to website
 */

// start session
session_start();
if(isset($_SESSION['uid'])) {
    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/load-transaction-contr.classes.php";

    // create new object load transaction controller
    $load_transaction = new LoadTransactionContr();

    if($_GET["type"] == "analysis") {
        // getting transaction analysis
        $load_transaction->get_analysis_transaction();
        // going back to front page
        header("Location: ../dashboard.php?error=none");
    } elseif ($_GET["type"] == "table") {
        // getting transaction table
        $load_transaction->get_table_transaction();
        // going back to table data transaction page
        header("Location: ../viewer.php?error=none");
    } elseif ($_GET["type"] == "filter") {
        $account = $_GET["account_type"];
        // getting transaction table
        $load_transaction->get_analysis_transaction($account);
        // going back to table data transaction page
        header("Location: ../dashboard.php?error=none");
    }
}