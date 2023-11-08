<?php
/*
 * delete-transaction-contr.classes.php
 * handle flow of deletion  transaction data
 */

class DeleteTransactionContr extends Transaction {
    public function delete_transaction($tid) {
        # delete transactions from database
        return $this->remove_transaction($tid);
    }
}