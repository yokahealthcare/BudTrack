<?php
/*
 * load-transaction.inc.php
 * handle loading transaction communication from database to website
 */

// start session
session_start();
if(isset($_POST["submit"]) && isset($_SESSION['uid'])) {
    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/load-transaction-contr.classes.php";

    // create new object load transaction controller
    $load_transaction = new LoadTransactionContr();

    // getting transaction
    $load_transaction->get_transaction();

    // going back to front page
    header("Location: ../dashboard.php?error=none");
}
