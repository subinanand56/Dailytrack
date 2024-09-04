<?php
session_start();

// Unset specific session variables
unset($_SESSION['role']);
unset($_SESSION['branch']);
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['token']);
// Destroy the session
session_destroy();

// Prevent caching of pages by setting appropriate headers
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Redirect to the login page
header("Location: index.php");
exit();
?>