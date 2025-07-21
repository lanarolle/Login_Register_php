<?php
session_start();
include 'config.php';

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user']);
}

// Redirect to login if not authenticated
$allowed_pages = ['login.php', 'register.php', 'index.php'];
$current_page = basename($_SERVER['PHP_SELF']);

if (!isLoggedIn() && !in_array($current_page, $allowed_pages)) {
    header('Location: login.php');
    exit();
}
?>