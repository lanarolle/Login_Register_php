<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // In a real application, you would:
    // 1. Validate the data
    // 2. Hash the password
    // 3. Store in a database
    
    // For this demo, we'll just log the user in directly
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email,
        'registration_date' => date('Y-m-d')
    ];
    
    header('Location: profile.php');
    exit();
} else {
    header('Location: register.php');
    exit();
}
?>