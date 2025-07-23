<?php
require_once 'includes/config.php';

// Get user name before destroying session
$userName = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : 'User';

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Delete the remember me cookie if it exists
if (isset($_COOKIE['remember_user'])) {
    $cookieOptions = [
        'expires' => time() - 3600,
        'path' => '/',
        'domain' => '',
        'secure' => false, // Set to true in production with HTTPS
        'httponly' => true,
        'samesite' => 'Strict'
    ];
    setcookie('remember_user', '', $cookieOptions);
}

// Start a new session for the flash message
session_start();
setFlashMessage('success', 'You have been successfully logged out. Thank you for visiting, ' . htmlspecialchars($userName) . '!');

// Redirect to login page
redirect('login.php');
?>