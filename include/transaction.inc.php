<?php
/*
 * transaction.inc.php
 * handle transaction communication from website to server codebase
 */

if(isset($_POST["submit"])) {
    // grabbing the transaction data from input field on website
    $title = $_POST["title"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $account = $_POST["account"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];
    $status = $_POST["status"];

    // import necessary modules
    include "../classes/dbh.classes.php";
    include "../classes/transaction.classes.php";
    include "../classes/transaction-contr.classes.php";

    // create new object of transaction controller
    $transaction = new TransactionContr($title, $date, $type, $account, $category, $amount, $status);

    // register the new user transaction
    $transaction->transaction_user();

    // going back to front page
    header("Location: load-transaction.inc.php?type=analysis");
}

if (isset($_FILES['transactionImage'])) {
    $file = $_FILES['transactionImage'];
    $fileName = $_SESSION['userId'] . '_' . $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // 5MB
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'assets/transaction_proof/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                // Here you can insert $fileDestination into your database
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}