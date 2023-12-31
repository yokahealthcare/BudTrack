<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card pt-3 pb-3">
                <div class="card-body">
                    <h2 class="display-4">Forgot Password</h2>
                    <br><br>
                    <form method="post" action="include/forgot-password.inc.php">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-custom btn-block">Reset Password</button>
                    </form>
                    <br>
                    <p>Remember your password? <a href="login.php">Log In</a></p>
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
