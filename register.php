<?php
$pageTitle = 'Register';
$pageDescription = 'Create a new account to access all features';
require_once 'includes/header.php';

// Redirect if already logged in
if ($currentUser) {
    redirect('profile.php');
}
?>

<main class="container">
    <section class="form-section">
        <h1>Create an Account</h1>
        <form id="registerForm" action="process_register.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required minlength="2" maxlength="100">
                <small>Enter your full name (2-100 characters)</small>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="255">
                <small>Enter a valid email address</small>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required minlength="8" maxlength="255">
                    <button type="button" class="toggle-password">👁️</button>
                </div>
                <small>Password must be at least 8 characters long</small>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="password-container">
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <button type="button" class="toggle-password">👁️</button>
                </div>
                <small>Re-enter your password to confirm</small>
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="terms" required>
                    I agree to the <a href="#" onclick="return false;">Terms and Conditions</a>
                </label>
            </div>
            
            <button type="submit" class="btn">Create Account</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
