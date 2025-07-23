<?php
require_once 'config.php';

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user']);
}

// Get current user data
function getCurrentUser() {
    return $_SESSION['user'] ?? null;
}

// Require authentication for protected pages
function requireAuth() {
    if (!isLoggedIn()) {
        setFlashMessage('error', 'Please log in to access this page.');
        redirect('login.php');
    }
}

// Check if current page requires authentication
$protectedPages = ['profile.php', 'contact.php'];
$currentPage = basename($_SERVER['PHP_SELF']);

if (in_array($currentPage, $protectedPages) && !isLoggedIn()) {
    requireAuth();
}
?>