<?php
/*
 * delete-transaction.inc.php
 * handle deletion of a transaction communication from database to website
 */

// start session
session_start();
if(isset($_POST['tid'])) {
    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/delete-transaction-contr.classes.php";

    // create new object delete transaction controller
    $delete_transaction = new DeleteTransactionContr();

    // execute return statement
    $execute = $delete_transaction->delete_transaction($_POST["tid"]);
    if($execute) {
        // if success, redirect to table transaction again
        header("Location: load-transaction.inc.php?type=table&error=none");
    } else {
        header("Location: load-transaction.inc.php?type=table&error=failed-to-delete");
    }
    exit();


}
