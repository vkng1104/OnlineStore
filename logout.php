<?php
include('./includes/config_session.inc.php');
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php?page=login");
exit();
