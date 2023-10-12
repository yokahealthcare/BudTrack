<?php


// transaction.classes.php
// handle transaction query inside database

session_start();
class Transaction extends Dbh {

    protected function set_transaction($title, $date, $type, $account, $category, $amount, $status) {
        $stmt = $this->connect()->prepare("INSERT INTO transaction (tid, title, date, type, account, category, amount, status, uid) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);");

        $tid = uniqid();
        $uid = $_SESSION['uid'];

        if(!$stmt->execute(array($tid, $title, $date, $type, $account, $category, $amount, $status, $uid))) {
            $stmt = null;
            header("Location: ../index.php?error=stmt-failed");
            exit();
        }

        $stmt = null;
    }

    protected function load_transaction() {
        $stmt = $this->connect()->prepare("SELECT * FROM transaction WHERE uid=?;");

        $uid = $_SESSION['uid'];

        if(!$stmt->execute(array($uid))) {
            $stmt = null;
            header("Location: ../index.php?error=stmt-failed");
            exit();
        }

        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['transactions'] = $transactions;

        $stmt = null;
    }

}