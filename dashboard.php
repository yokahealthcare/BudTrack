<?php
session_start();
if(!isset($_SESSION['uid'])) {
    header("Location: login.php?error=session-not-found");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ANJAY BudTrack</title>
    <link rel="icon" type="image/x-icon" href="assets/logo/favicon/favicon.ico">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for Styling -->
    <style>
        /* Custom button style */
        .btn-custom {
            background-color: #ebe9e4; /* Light Gray */
            border-color: #ebe9e4;
        }

        .btn-custom:hover {
            background-color: #c2c0ba; /* Darker Gray on hover */
            border-color: #c2c0ba;
        }

        /* Custom font color */
        body {
            color: #808080; /* Gray */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>ANJAY BudTrack</b></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="include/logout.inc.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container mt-5 mb-5">
    <div class="row mt-4 mb-4">
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#newTransactionModal">New Transaction</button>
        </div>
        <div class="col-md-3">
            <form method="get" action="include/load-transaction.inc.php">
                <input type="hidden" name="type" value="table">
                <button class="btn btn-success btn-block" name="submit">Show All Transactions</button>
            </form>
        </div>
        <div class="col-md-3">
            <form method="get" action="include/load-transaction.inc.php">
                <input type="hidden" name="type" value="analysis">
                <button class="btn btn-success btn-block" name="submit">Refresh Analysis Data</button>
            </form>
        </div>
    </div>
    <div class="row">
        <!-- Sidebar col-md-4 -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Account</h5>
                </div>
                <div class="card-body">
                    <select class="form-control">
                        <option value="personal">Personal</option>
                        <option value="family">Family</option>
                        <option value="business">Business</option>
                    </select>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Total Balance</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["balance"]; ?></h1>
                </div>
            </div>
        </div>

        <!-- Main Content col-md-8 -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Cash Flow</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h1>Income</h1>
                            <h3 class="text-primary"><?php echo $_SESSION["transaction"]["cashflow"]["income"]; ?>%</h3>
                        </div>
                        <div class="col-6">
                            <h1>Expense</h1>
                            <h3 class="text-primary"><?php echo $_SESSION["transaction"]["cashflow"]["expense"]; ?>%</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Income</h5>
                </div>
                <div class="card-body">
                    <i class="fas fa-arrow-up text-success"></i>
                    <h1 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["income"]; ?></h1>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Expense</h5>
                </div>
                <div class="card-body">
                    <i class="fas fa-arrow-down text-danger"></i>
                    <h1 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["expense"]; ?></h1>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Expenses</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Housing</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["housing"]; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <p>Food</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["food"]; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <p>Transportation</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["transportation"]; ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <p>Health</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["health"]; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <p>Entertainment</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["entertainment"]; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <p>Saving</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["saving"]; ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <p>Misc</p>
                            <h6 class="text-primary rupiah-formatted"><?php echo $_SESSION["transaction"]["detail"]["misc"]; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - New Transaction -->
<div class="modal fade" id="newTransactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="include/transaction.inc.php">
                <div class="modal-body">

                        <!-- Title input -->
                        <div class="form-group">
                            <label for="transactionTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="transactionTitle">
                        </div>

                        <!-- Date input -->
                        <div class="form-group">
                            <label for="transactionDate">Date</label>
                            <input type="date" name="date" class="form-control" id="transactionDate">
                        </div>

                        <!-- Type dropdown -->
                        <div class="form-group">
                            <label for="transactionType">Type</label>
                            <select class="form-control" name="type" id="transactionType">
                                <option value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>

                        <!-- Account dropdown -->
                        <div class="form-group">
                            <label for="transactionAccount">Account</label>
                            <select class="form-control" name="account" id="transactionAccount">
                                <option value="Personal">Personal</option>
                                <option value="Business">Business</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>

                        <!-- Category dropdown -->
                        <div class="form-group">
                            <label for="transactionCategory">Category</label>
                            <select class="form-control" name="category" id="transactionCategory">
                                <option value="Housing">Housing</option>
                                <option value="Food">Food</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Health">Health</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Saving">Saving</option>
                                <option value="Misc">Misc</option>
                            </select>
                        </div>

                        <!-- Status dropdown -->
                        <div class="form-group">
                            <label for="transactionAmount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="transactionAmount">
                        </div>

                        <!-- Status dropdown -->
                        <div class="form-group">
                            <label for="transactionStatus">Status</label>
                            <select class="form-control" name="status" id="transactionStatus">
                                <option value="Finish">Finish</option>
                                <option value="Reserved">Reserved</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save Transaction</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Include Bootstrap JS and jQuery (for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/format.js"></script>
<script>
    // Get all elements with the 'balance' class
    const balanceElements = document.querySelectorAll('.rupiah-formatted');

    // Loop through each element and format the content
    balanceElements.forEach((element) => {
        const balanceAmount = parseFloat(element.textContent);
        const formattedBalance = formatToRupiah(balanceAmount);
        element.textContent = formattedBalance;
    });
</script>
</body>
</html>
