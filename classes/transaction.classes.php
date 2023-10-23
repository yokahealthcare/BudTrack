<?php
/*
 * transaction.classes.php
 * handle transaction query inside database
 */

// start the session
session_start();
class Transaction extends Dbh {
    /*
     * new_transaction()
     * register new transaction to database
     *
     * STEPS:
     * 1. generate new unique transaction ID
     * 2. getting user ID from session variable
     * 3. register the new transaction to database
     */

    protected function new_transaction($title, $date, $type, $account, $category, $amount, $status) {
        // insert new transaction to database
        $stmt = $this->connect()->prepare("INSERT INTO transaction (tid, title, date, type, account, category, amount, status, uid) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);");

        // generate unique id
        $tid = uniqid();
        // get the user id from the stored session variable
        $uid = $_SESSION['uid'];

        // execute the above query
        // with check, if failed
        // when it failed, user getting redirected to dashboard.php
        if(!$stmt->execute(array($tid, $title, $date, $type, $account, $category, $amount, $status, $uid))) {
            $stmt = null;
            header("Location: ../dashboard.php?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    /*
     * load_transaction()
     * load all transactions data from database
     *
     * STEPS:
     * 1.
     */
    protected function load_transaction() {
        // fetch all transactions from database + store it in SESSION
        $stmt = $this->connect()->prepare("SELECT * FROM transaction WHERE uid=?;");

        // get the user id from the stored session variable
        $uid = $_SESSION['uid'];

        // execute query
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if(!$stmt->execute(array($uid))) {
            $stmt = null;
            header("Location: ../dashboard.php?error=stmt-failed");
            exit();
        }

        // if there is no error occur
        // fetch all transactions data from database
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // then, stored to $_SESSION variable
        $_SESSION['transactions'] = $transactions;

        $stmt = null;
    }
}