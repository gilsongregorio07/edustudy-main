<?php
include '../../modules/utils/env.php' ;

session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (you can change this to any desired location)
header("Location: $BASE_DIR/index.php");

exit();