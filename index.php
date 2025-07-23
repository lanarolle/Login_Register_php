<?php
$pageTitle = 'Home';
$pageDescription = 'Welcome to our WebDev Assignment demonstration website';
require_once 'includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Welcome to Our Website</h1>
        <p>This is a demonstration site for the Web Development assignment showcasing secure PHP development practices.</p>
        <div class="cta-buttons">
            <?php if (!$currentUser): ?>
                <a href="register.php" class="btn">Register</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            <?php else: ?>
                <a href="profile.php" class="btn">View Profile</a>
                <a href="contact.php" class="btn btn-secondary">Contact Us</a>
            <?php endif; ?>
        </div>
    </section>
    
    <section class="features">
        <div class="feature-card">
            <h2>🔐 Secure Authentication</h2>
            <p>Safe user registration and login with proper session management and CSRF protection.</p>
        </div>
        <div class="feature-card">
            <h2>👤 User Profiles</h2>
            <p>Personalized user profiles with secure data handling and input validation.</p>
        </div>
        <div class="feature-card">
            <h2>📧 Contact System</h2>
            <p>Secure contact form with input sanitization and proper error handling.</p>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>