<?php
include 'includes/config.php';
include 'includes/header.php';

// Check for login error
$login_error = isset($_GET['error']) ? 'Invalid username or password' : '';
?>

<main class="container">
    <section class="form-section">
        <h1>Login to Your Account</h1>
        <?php if ($login_error): ?>
            <div class="alert error"><?= $login_error ?></div>
        <?php endif; ?>
        <form id="loginForm" action="process_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <button type="button" class="toggle-password">👁️</button>
                </div>
            </div>
            <div class="form-group remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>