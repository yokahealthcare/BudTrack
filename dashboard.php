<?php
session_start();
if(!isset($_SESSION['uid'])) {
    header("Location: login.php?error=session-not-found");
    exit();
} else {
    // load all transaction to $SESSION
    print_r($_SESSION['transactions']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Financial Tracker</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for Styling -->
    <link rel="stylesheet" href="styles.css"> <!-- Create a separate CSS file for your custom styles -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Financial Tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="include/logout.inc.php"><button class="btn btn-sm btn-danger">LOGOUT</button></a>
            </li>
        </ul>
    </div>
</nav>

<!-- Dashboard Section -->
<section class="dashboard">
    <div class="container">
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Income Summary</h5>
                        <!-- Add your income-related content here -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Expense Summary</h5>
                        <!-- Add your expense-related content here -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Financial Trends</h5>
                        <!-- Add your financial trends content here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Transaction</h5>
                        <!-- Form to add a new transaction -->
                        <form action="include/transaction.inc.php" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="Income">Income</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <select class="form-control" id="account" name="account" required>
                                    <option value="Personal">Personal</option>
                                    <option value="Business">Business</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="Housing">Housing</option>
                                    <option value="Food">Food</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Health">Health</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Saving">Saving</option>
                                    <option value="Misc">Misc</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount (in rupiah)</label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Finish">Finish</option>
                                    <option value="Un-Finished">Un-Finished</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Add Transaction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <p>&copy; 2023 Financial Tracker</p>
</footer>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
