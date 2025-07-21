<?php
include 'includes/auth.php'; // Check if user is logged in

// Hardcoded user data for demonstration
$user = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'registration_date' => '2023-05-15'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - WebDev Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="container">
        <section class="profile-section">
            <h1>My Profile</h1>
            <div class="profile-card">
                <div class="profile-header">
                    <div class="avatar"><?= strtoupper(substr($user['name'], 0, 1)) ?></div>
                    <h2><?= htmlspecialchars($user['name']) ?></h2>
                </div>
                <div class="profile-details">
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Member since:</strong> <?= $user['registration_date'] ?></p>
                </div>
            </div>
            
            <div class="profile-actions">
                <a href="contact.php" class="btn">Contact Us</a>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>