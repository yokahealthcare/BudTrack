<?php
session_start();
if(!isset($_SESSION['uid'])) {
    header("Location: login.php?error=session-not-found");
    exit();
} else {
    // load all transaction to $SESSION
    // print_r($_SESSION['transactions']);
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
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row mt-4 mb-4">
        <div class="col-md-6">
            <button class="btn btn-success btn-block">Show All Transactions</button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary btn-block">New Transaction</button>
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
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Total Balance</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-primary">IDR</h1>
                    <p></p>
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
                    <h1 class="text-primary">IDR</h1>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Income</h5>
                </div>
                <div class="card-body">
                    <i class="fas fa-arrow-up text-success"></i>
                    <h1 class="text-primary">IDR</h1>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Expense</h5>
                </div>
                <div class="card-body">
                    <i class="fas fa-arrow-down text-danger"></i>
                    <h1 class="text-primary">IDR</h1>
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
                            <h6>IDR</h6>
                        </div>
                        <div class="col-md-4">
                            <p>Food</p>
                            <h6>IDR</h6>
                        </div>
                        <div class="col-md-4">
                            <p>Transportation</p>
                            <h6>IDR</h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <p>Health</p>
                            <h6>IDR</h6>
                        </div>
                        <div class="col-md-4">
                            <p>Entertainment</p>
                            <h6>IDR</h6>
                        </div>
                        <div class="col-md-4">
                            <p>Saving</p>
                            <h6>IDR</h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <p>Misc</p>
                            <h6>IDR</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery (for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
