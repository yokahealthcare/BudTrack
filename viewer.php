<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Table</title>
    <!-- Include Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Transaction Table</h2><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Type</th>
            <th>Account</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Loop through each transaction in the session data
        foreach ($_SESSION["table_transaction"] as $transaction) {
            echo "<tr>";
            echo "<td>" . $transaction["tid"] . "</td>";
            echo "<td>" . $transaction["title"] . "</td>";
            echo "<td>" . $transaction["date"] . "</td>";
            echo "<td>" . $transaction["type"] . "</td>";
            echo "<td>" . $transaction["account"] . "</td>";
            echo "<td>" . $transaction["category"] . "</td>";
            echo "<td>" . $transaction["amount"] . "</td>";
            echo "<td>" . $transaction["status"] . "</td>";
            echo "<td>
                <form method=\"post\" action=\"include/delete-transaction.inc.php\">
                    <input type=\"hidden\" name=\"tid\" value=".$transaction["tid"].">
                    <button class=\"btn btn-danger\" name=\"submit\">Delete</button>
                </form>
                <form method=\"get\" action=\"update-viewer.php\">
                    <input type=\"hidden\" name=\"tid\" value=".$transaction["tid"].">
                    <input type=\"hidden\" name=\"title\" value=".$transaction["title"].">
                    <input type=\"hidden\" name=\"date\" value=".$transaction["date"].">
                    <input type=\"hidden\" name=\"type\" value=".$transaction["type"].">
                    <input type=\"hidden\" name=\"account\" value=".$transaction["account"].">
                    <input type=\"hidden\" name=\"category\" value=".$transaction["category"].">
                    <input type=\"hidden\" name=\"amount\" value=".$transaction["amount"].">
                    <input type=\"hidden\" name=\"status\" value=".$transaction["status"].">
                    <button class=\"btn btn-info\" name=\"submit\">Edit</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <a href="include/load-transaction.inc.php?type=analysis">
        <button class="btn btn-primary">Go Back to Dashboard</button>
    </a>
    
</div>

<!-- Include Bootstrap 4 JS and jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
