<?php
/*
 * transaction-contr.classes.php
 * handle flow of transaction data
 */
class UpdateTransactionContr extends Transaction {
    // define private variable
    private $tid;
    private $title;
    private $date;
    private $type;
    private $account;
    private $category;
    private $amount;
    private $status;

    public function __construct($tid, $title, $date, $type, $account, $category, $amount, $status) {
        // define private variable values
        $this->tid = $tid;
        $this->title = $title;
        $this->date = $date;
        $this->type = $type;
        $this->account = $account;
        $this->category = $category;
        $this->amount = $amount;
        $this->status = $status;
    }


    // Inside TransactionContr class
    public function updateTransaction() {
        if (!$this->empty_input()) {
            header("Location: ../dashboard.php?error=empty-input");
            exit();
        }

        # delete transactions from database
        return $this->update_transaction($this->tid, $this->title, $this->date, $this->type, $this->account, $this->category, $this->amount, $this->status);
    }

    private function empty_input() {
        $result = null;
        // check for any private variable that has no value in it
        // if all has value, return false
        // if one or more do not have value, return true
        if (empty($this->title) || empty($this->date) || empty($this->type) || empty($this->account) || empty($this->category) || empty($this->amount) || empty($this->status)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    
}