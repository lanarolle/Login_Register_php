<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

// Ensure user is logged in
$user = getCurrentUser();
if (!$user) {
    redirect('login.php');
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('contact.php');
}

// Validate CSRF token
if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
    setFlashMessage('error', 'Invalid request. Please try again.');
    redirect('contact.php');
}

// Get and sanitize input
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$subject = sanitizeInput($_POST['subject'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');
$rating = (int)($_POST['rating'] ?? 0);
$priority = sanitizeInput($_POST['priority'] ?? 'medium');

// Validation
$errors = [];

if (empty($subject)) {
    $errors[] = 'Please select a subject.';
}

if (empty($message) || strlen($message) < 10 || strlen($message) > 1000) {
    $errors[] = 'Message must be between 10 and 1000 characters.';
}

if ($rating < 1 || $rating > 5) {
    $errors[] = 'Rating must be between 1 and 5.';
}

$validPriorities = ['low', 'medium', 'high', 'urgent'];
if (!in_array($priority, $validPriorities)) {
    $errors[] = 'Invalid priority level.';
}

// Verify the name and email match the logged-in user
if ($name !== $user['name'] || $email !== $user['email']) {
    $errors[] = 'User information mismatch. Please refresh the page and try again.';
}

// If there are errors, redirect back with error messages
if (!empty($errors)) {
    foreach ($errors as $error) {
        setFlashMessage('error', $error);
    }
    redirect('contact.php');
}

// In a real application, you would:
// 1. Store the contact message in a database
// 2. Send email notification to administrators
// 3. Send confirmation email to user
// 4. Implement rate limiting to prevent spam

// For demo purposes, we'll create a contact data array
$contactData = [
    'user_id' => $user['id'],
    'user_name' => $name,
    'user_email' => $email,
    'subject' => $subject,
    'message' => $message,
    'rating' => $rating,
    'priority' => $priority,
    'submission_date' => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
];

// Simulate saving to database (in production, use proper database operations)
$contactId = rand(1000, 9999);

// Log the contact submission (in production, use proper logging)
error_log("Contact form submission: ID $contactId, User: {$user['email']}, Subject: $subject");

// Set success message
setFlashMessage('success', 'Thank you for your message! We have received your ' . ucfirst($priority) . ' priority inquiry and will respond within 24-48 hours.');

// Redirect back to profile with success indicator
redirect('profile.php?contact_success=1');
?>