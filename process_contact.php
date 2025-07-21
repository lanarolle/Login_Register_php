<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $rating = $_POST['rating'] ?? '';
    
    // In a real application, you would save this to a database
    $contactData = [
        'user_email' => $_SESSION['user']['email'],
        'subject' => $subject,
        'message' => $message,
        'rating' => $rating,
        'submission_date' => date('Y-m-d H:i:s')
    ];
    
    // For demo purposes, we'll just redirect back to profile
    header('Location: profile.php?contact_success=1');
    exit();
} else {
    header('Location: contact.php');
    exit();
}
?>