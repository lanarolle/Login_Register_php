<?php
session_start();
include_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Simple validation against hardcoded credentials
    if ($email === VALID_USERNAME && $password === VALID_PASSWORD) {
        $_SESSION['user'] = [
            'name' => 'Admin User',
            'email' => $email,
            'avatar_text' => DEFAULT_AVATAR_TEXT
        ];

        if ($remember) {
            // Set cookie to expire in 30 days
            setcookie('remember_user', $email, time() + (30 * 24 * 60 * 60), '/');
        }

        header('Location: ../profile.php');
        exit();
    } else {
        header('Location: ../login.php?error=1');
        exit();
    }
} else {
    header('Location: ../login.php');
    exit();
}
?>