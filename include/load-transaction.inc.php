<?php

if(isset($_POST["submit"])) {
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/load-transaction-contr.classes.php";
    $load_transaction = new LoadTransactionContr();

    // running error handlers and getting transaction
    $load_transaction->get_transaction();

    // going back to front page
    header("Location: ../dashboard.php?error=none");
}
