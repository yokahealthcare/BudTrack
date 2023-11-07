<?php
/*
 * load-transaction-contr.classes.php
 * handle flow of loading the transaction data
 */

class LoadTransactionContr extends Transaction {
    public function get_analysis_transaction() {
        # get all analysis transactions from database
        $this->load_analysis_transaction();
    }

    public function get_table_transaction() {
        # get all table transactions from database
        $this->load_table_transaction();
    }
}