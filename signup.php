<?php
session_start();
if(isset($_SESSION['uid'])) {
    header("Location: dashboard.php?error=none");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Signup</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="include/signup.inc.php">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="password_repeat">Repeat Password:</label>
                            <label>
                                <input type="password" class="form-control" id="password_repeat" name="password_repeat" required>
                            </label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
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
