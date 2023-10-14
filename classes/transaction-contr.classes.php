<?php
// transaction-contr.classes.php
// handle flow of transaction data

class TransactionContr extends Transaction {
    private $title;
    private $date;
    private $type;
    private $account;
    private $category;
    private $amount;
    private $status;

    public function __construct($title, $date, $type, $account, $category, $amount, $status) {
        $this->title = $title;
        $this->date = $date;
        $this->type = $type;
        $this->account = $account;
        $this->category = $category;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function transaction_user() {
        // using the function "empty_input()" to check for empty field
        if (!$this->empty_input()) {
            header("Location: ../dashboard.php?error=empty-input");
            exit();
        }

        # write transaction to database
        $this->set_transaction($this->title, $this->date, $this->type, $this->account, $this->category, $this->amount, $this->status);
    }

    private function empty_input() {
        $result = null;
        if (empty($this->title) || empty($this->date) || empty($this->type) || empty($this->account) || empty($this->category) || empty($this->amount) || empty($this->status)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
