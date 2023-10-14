<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        header("Location: dashboard.php?error=none");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#">Indonesia</a>
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card pt-3 pb-3">
                <div class="card-body">
                    <form method="post" action="include/signup.inc.php">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name "username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_repeat">Repeat Password:</label>
                            <input type="password" class="form-control" id="password_repeat" name="password_repeat" required>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-custom btn-block">Sign Up</button>
                    </form>
                    <br>
                    <p>Already have an account? <a href="login.php">Log In</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <h1>Signup Now!</h1>
            <h1 class="display-3" id="signup-banner">Empower Your Financial Journey with BudTrack!</h1>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery (for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/animation.js"></script>
<!-- Custom JavaScript -->
<script>
    typing_text("Empower Your Financial Journey with BudTrack!", "signup-banner");
</script>

</body>
</html>
