<?php
/*
 * load-transaction-contr.classes.php
 * handle flow of loading the transaction data
 */

class LoadTransactionContr extends Transaction {
    public function get_transaction() {
        # get all transactions from database
        $this->load_transaction();
    }
}