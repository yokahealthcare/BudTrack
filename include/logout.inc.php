<?php

    session_start();
    session_unset();
    session_destroy();

    // going back index page
    header("Location: ../index.php?error=none");
    exit();