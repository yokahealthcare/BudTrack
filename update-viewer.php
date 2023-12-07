<?php
    if(isset($_GET["tid"])) {
        $tid = $_GET["tid"];
        $title = $_GET["title"];
        $date = $_GET["date"];
        $type = $_GET["type"];
        $account = $_GET["account"];
        $category = $_GET["category"];
        $amount = $_GET["amount"];
        $status = $_GET["status"];
    } 
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaction</title>
    <!-- Include Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
</head>
<body>

    <div class="container mt-5">
        <h1>Update Transaction</h1>

        <br><br>
        <form action="include/update-transaction.inc.php" method="post">
            <!-- tid input -->
            <input type="hidden" name="tid" value="<?php echo $tid;?>">
            
            <!-- Title input -->
            <div class="form-group">
                <label for="transactionTitle">Title</label>
                <input type="text" name="title" class="form-control" id="transactionTitle" 
                    value="<?php echo $title;?>" required>
            </div>

            <!-- Date input -->
            <div class="form-group">
                <label for="transactionDate">Date</label>
                <input type="date" name="date" class="form-control" id="transactionDate"
                value="<?php echo $date;?>" required>
            </div>

            <!-- Type dropdown -->
            <div class="form-group">
                <label for="transactionType">Type</label>
                <select class="form-control" name="type" id="transactionType" required>
                    <option value="Income" <?php echo ($type == 'Income') ? 'selected' : ''; ?>>Income</option>
                    <option value="Expense" <?php echo ($type == 'Expense') ? 'selected' : ''; ?>>Expense</option>
                </select>
            </div>

            <!-- Account dropdown -->
            <div class="form-group">
                <label for="transactionAccount">Account</label>
                <select class="form-control" name="account" id="transactionAccount" required>
                    <option value="Personal" <?php echo ($account == 'Personal') ? 'selected' : ''; ?>>Personal</option>
                    <option value="Business" <?php echo ($account == 'Business') ? 'selected' : ''; ?>>Business</option>
                    <option value="Family" <?php echo ($account == 'Family') ? 'selected' : ''; ?>>Family</option>
                </select>
            </div>


            <!-- Category dropdown -->
            <div class="form-group">
                <label for="transactionCategory">Category</label>
                <select class="form-control" name="category" id="transactionCategory" required>
                    <option value="Housing" <?php echo ($category == 'Housing') ? 'selected' : ''; ?>>Housing</option>
                    <option value="Food" <?php echo ($category == 'Food') ? 'selected' : ''; ?>>Food</option>
                    <option value="Transportation" <?php echo ($category == 'Transportation') ? 'selected' : ''; ?>>Transportation</option>
                    <option value="Health" <?php echo ($category == 'Health') ? 'selected' : ''; ?>>Health</option>
                    <option value="Entertainment" <?php echo ($category == 'Entertainment') ? 'selected' : ''; ?>>Entertainment</option>
                    <option value="Saving" <?php echo ($category == 'Saving') ? 'selected' : ''; ?>>Saving</option>
                    <option value="Misc" <?php echo ($category == 'Misc') ? 'selected' : ''; ?>>Misc</option>
                </select>
            </div>


            <!-- Status dropdown -->
            <div class="form-group">
                <label for="transactionAmount">Amount</label>
                <input type="number" name="amount" class="form-control" id="transactionAmount" 
                value="<?php echo $amount;?>" required>
            </div>

            <!-- Status dropdown -->
            <div class="form-group">
                <label for="transactionStatus">Status</label>
                <select class="form-control" name="status" id="transactionStatus" required>
                    <option value="Finish" <?php echo ($status == 'Finish') ? 'selected' : ''; ?>>Finish</option>
                    <option value="Reserved" <?php echo ($status == 'Reserved') ? 'selected' : ''; ?>>Reserved</option>
                </select>
            </div>

            <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" name="submit" class="btn btn-block btn-primary">SAVE</button>
                </div>
            </div>

        </form>

        <a href="include/load-transaction.inc.php?type=table">
            <button class="btn btn-secondary">Go Back to Table</button>
        </a>

    </div>


    <!-- Include Bootstrap 4 JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>