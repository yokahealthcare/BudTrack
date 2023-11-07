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
     * load_table_transaction()
     * load all transactions data from database
     *
     * STEPS:
     * 1. get the user id from session stored
     * 2. fetch all transactions data from database using the user id
     * 3. store it the fetched data to session
     */
    protected function load_table_transaction() {
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // then, stored to $_SESSION variable
        $_SESSION['table_transaction'] = $result;

        $stmt = null;
    }


    protected function load_analysis_transaction() {
        // load the sum of income and expense dictionary
        list($sum_income, $sum_expense) = $this->load_income_expense();

        $tmp = [
            "balance" => $this->load_balance($sum_income, $sum_expense),
            "cashflow" => $this->load_cashflow($sum_income+$sum_expense, $sum_income, $sum_expense),
            "income" => $sum_income,
            "expense" => $sum_expense,
            "detail" => [
                "housing" => $this->load_expense_category("Housing"),
                "food" => $this->load_expense_category("Food"),
                "transportation" => $this->load_expense_category("Transportation"),
                "health" => $this->load_expense_category("Health"),
                "entertainment" => $this->load_expense_category("Entertainment"),
                "saving" => $this->load_expense_category("Saving"),
                "misc" => $this->load_expense_category("Misc")
            ]
        ];

        // then, stored to $_SESSION variable
        $_SESSION['transaction'] = $tmp;

        $stmt = null;
    }


    protected function load_income_expense()
    {
        // get the user id from the stored session variable
        $uid = $_SESSION['uid'];

        $stmt = $this->connect()->prepare("SELECT SUM(amount) AS sum FROM transaction WHERE type='Income' AND uid=?;");
        // execute query
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("Location: ../dashboard.php?error=stmt-failed");
            exit();
        }
        // if there is no error occur
        // fetch the data
        $income = $stmt->fetch(PDO::FETCH_ASSOC)['sum'];

        $stmt = $this->connect()->prepare("SELECT SUM(amount) AS sum FROM transaction WHERE type='Expense' AND uid=?;");
        // execute query
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("Location: ../dashboard.php?error=stmt-failed");
            exit();
        }
        // if there is no error occur
        // fetch the data
        $expense = $stmt->fetch(PDO::FETCH_ASSOC)['sum'];

        return [$income, $expense];
    }

    protected function load_expense_category($category)
    {
        // get the user id from the stored session variable
        $uid = $_SESSION['uid'];

        $stmt = $this->connect()->prepare("SELECT SUM(amount) AS sum FROM transaction WHERE type='Expense' AND uid=? AND category=?;");
        // execute query
        // with check, if failed
        // when it failed, user get redirected to dashboard.php
        if (!$stmt->execute(array($uid, $category))) {
            $stmt = null;
            header("Location: ../dashboard.php?error=stmt-failed");
            exit();
        }
        // if there is no error occur
        // fetch the data
        return $stmt->fetch(PDO::FETCH_ASSOC)['sum'];
    }

    protected function load_balance($sum_income, $sum_expense)
    {
        return $sum_income - $sum_expense;
    }

    protected function load_cashflow($total, $sum_income, $sum_expense)
    {
        $tmp = [
            "income" => number_format(($sum_expense / $total) * 100,2),
            "expense" => number_format(($sum_income / $total) * 100,2)
        ];

        return $tmp;
    }
}