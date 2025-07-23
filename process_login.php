<?php
require_once 'includes/config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

// Validate CSRF token
if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
    setFlashMessage('error', 'Invalid request. Please try again.');
    redirect('login.php');
}

// Get and sanitize input
$email = sanitizeInput($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// Basic validation
if (empty($email) || empty($password)) {
    setFlashMessage('error', 'Please fill in all required fields.');
    redirect('login.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlashMessage('error', 'Please enter a valid email address.');
    redirect('login.php');
}

// Demo credentials (in production, you'd check against a database with hashed passwords)
$validCredentials = [
    'admin@example.com' => [
        'password' => 'password123',
        'name' => 'Admin User',
        'id' => 1
    ],
    'user@example.com' => [
        'password' => 'password123',
        'name' => 'Regular User',
        'id' => 2
    ]
];

// Check credentials
if (isset($validCredentials[$email]) && $validCredentials[$email]['password'] === $password) {
    // Regenerate session ID for security
    session_regenerate_id(true);
    
    // Set user session
    $_SESSION['user'] = [
        'id' => $validCredentials[$email]['id'],
        'name' => $validCredentials[$email]['name'],
        'email' => $email,
        'login_time' => date('Y-m-d H:i:s')
    ];

    // Handle remember me functionality
    if ($remember) {
        // Set secure cookie (30 days)
        $cookieOptions = [
            'expires' => time() + (30 * 24 * 60 * 60),
            'path' => '/',
            'domain' => '',
            'secure' => false, // Set to true in production with HTTPS
            'httponly' => true,
            'samesite' => 'Strict'
        ];
        setcookie('remember_user', $email, $cookieOptions);
    }

    setFlashMessage('success', 'Welcome back, ' . htmlspecialchars($validCredentials[$email]['name']) . '!');
    redirect('profile.php');
} else {
    // Add a small delay to prevent timing attacks
    usleep(500000); // 0.5 seconds
    
    setFlashMessage('error', 'Invalid email or password.');
    redirect('login.php?error=1');
}
?>