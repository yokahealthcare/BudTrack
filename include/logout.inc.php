<?php
/*
 * logout.inc.php
 * handle logout communication from website to server codebase
 */

// start session
session_start();
// unset any session variables
session_unset();
// destroy any session variables
session_destroy();

// going back index page
header("Location: ../index.php?error=none");
// making sure it exit this page
exit();