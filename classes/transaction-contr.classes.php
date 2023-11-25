<?php
/*
 * transaction-contr.classes.php
 * handle flow of transaction data
 */
class TransactionContr extends Transaction {
    // define private variable
    private $title;
    private $date;
    private $type;
    private $account;
    private $category;
    private $amount;
    private $status;

    public function __construct($title, $date, $type, $account, $category, $amount, $status) {
        // define private variable values
        $this->title = $title;
        $this->date = $date;
        $this->type = $type;
        $this->account = $account;
        $this->category = $category;
        $this->amount = $amount;
        $this->status = $status;
    }

    /*
     * transaction_user()
     * checking input data before write it to database
     *
     * STEPS:
     * 1. check for empty input
     * 2. register new transaction to database
     */
    public function transaction_user() {
        // check for empty input
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if (!$this->empty_input()) {
            header("Location: ../dashboard.php?error=empty-input");
            exit();
        }

        # write transaction to database
        $this->new_transaction($this->title, $this->date, $this->type, $this->account, $this->category, $this->amount, $this->status);
    }

    // write update transaction to database and replace the old one
    public function updateTransaction() {
        // check for empty input
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if (!$this->empty_input()) {
            header("Location: ../dashboard.php?error=empty-input");
            exit();
        }

        # write transaction to database
        $this->update_transaction($this->title, $this->date, $this->type, $this->account, $this->category, $this->amount, $this->status);
    }

    /*
     * empty_input()
     * check for empty input data
     */
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
