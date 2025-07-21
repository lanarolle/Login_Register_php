<?php
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="container">
    <section class="hero">
        <h1>Welcome to Our Website</h1>
        <p>This is a demonstration site for the Web Development assignment.</p>
        <div class="cta-buttons">
            <a href="register.php" class="btn">Register</a>
            <a href="login.php" class="btn btn-secondary">Login</a>
        </div>
    </section>

    <section class="features">
        <div class="feature-card">
            <h2>User Registration</h2>
            <p>Create an account to access all features.</p>
        </div>
        <div class="feature-card">
            <h2>Secure Login</h2>
            <p>Protected access to your personal profile.</p>
        </div>
        <div class="feature-card">
            <h2>Contact Form</h2>
            <p>Send us your feedback and questions.</p>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>