<?php
$pageTitle = 'Login';
$pageDescription = 'Sign in to your account';
require_once 'includes/header.php';

// Redirect if already logged in
if ($currentUser) {
    redirect('profile.php');
}

// Check for error parameter
$loginError = isset($_GET['error']) ? true : false;
?>

<main class="container">
    <section class="form-section">
        <h1>Login to Your Account</h1>
        
        <?php if ($loginError): ?>
            <div class="error-message">
                <p>Invalid email or password. Please try again.</p>
            </div>
        <?php endif; ?>
        
        <form id="loginForm" action="process_login.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="255" 
                       value="<?php echo isset($_COOKIE['remember_user']) ? htmlspecialchars($_COOKIE['remember_user']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <button type="button" class="toggle-password">👁️</button>
                </div>
            </div>
            
            <div class="form-group remember-me">
                <label class="checkbox-label">
                    <input type="checkbox" id="remember" name="remember" 
                           <?php echo isset($_COOKIE['remember_user']) ? 'checked' : ''; ?>>
                    Remember me
                </label>
            </div>
            
            <button type="submit" class="btn">Login</button>
        </form>
        
        <div class="form-links">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <p><a href="#" onclick="return false;">Forgot your password?</a></p>
        </div>
        
        <div class="demo-credentials">
            <h3>Demo Credentials:</h3>
            <p><strong>Email:</strong> admin@example.com</p>
            <p><strong>Password:</strong> password123</p>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>