<?php
require_once 'includes/config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

// Validate CSRF token
if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
    setFlashMessage('error', 'Invalid request. Please try again.');
    redirect('register.php');
}

// Get and sanitize input
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';
$termsAccepted = isset($_POST['terms']);

// Validation
$errors = [];

if (empty($name) || strlen($name) < 2 || strlen($name) > 100) {
    $errors[] = 'Name must be between 2 and 100 characters.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if (empty($password) || strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters long.';
}

if ($password !== $confirmPassword) {
    $errors[] = 'Passwords do not match.';
}

if (!$termsAccepted) {
    $errors[] = 'You must accept the terms and conditions.';
}

// Check for existing user (in production, check database)
$existingUsers = ['admin@example.com', 'user@example.com'];
if (in_array($email, $existingUsers)) {
    $errors[] = 'An account with this email already exists.';
}

// If there are errors, redirect back with error messages
if (!empty($errors)) {
    foreach ($errors as $error) {
        setFlashMessage('error', $error);
    }
    redirect('register.php');
}

// In production, you would:
// 1. Hash the password using password_hash()
// 2. Store user data in database
// 3. Send verification email
// 4. Handle proper error checking

// For demo purposes, create session and log user in
session_regenerate_id(true);

$_SESSION['user'] = [
    'id' => rand(1000, 9999), // In production, this would be from database
    'name' => $name,
    'email' => $email,
    'registration_date' => date('Y-m-d'),
    'login_time' => date('Y-m-d H:i:s')
];

setFlashMessage('success', 'Account created successfully! Welcome, ' . htmlspecialchars($name) . '!');
redirect('profile.php');
?>