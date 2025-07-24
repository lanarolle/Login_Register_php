<?php
include_once 'includes/config.php';
include 'includes/header.php';

// Check for login error
$login_error = isset($_GET['error']) ? 'Invalid username or password' : '';
$page_title = 'Login';
?>

<main>
    <!-- Login Hero Section -->
    <section class="auth-hero">
        <div class="container">
            <div class="auth-content">
                <div class="auth-image">
                    <div class="auth-illustration">
                        <div class="illustration-bg">
                            <div class="floating-icon">🔐</div>
                            <div class="floating-icon">💻</div>
                            <div class="floating-icon">🚀</div>
                        </div>
                        <h2>Welcome Back!</h2>
                        <p>Access your professional dashboard and continue building your network.</p>
                        <div class="auth-benefits">
                            <div class="benefit-item">
                                <span class="benefit-icon">✓</span>
                                <span>Secure login</span>
                            </div>
                            <div class="benefit-item">
                                <span class="benefit-icon">✓</span>
                                <span>Access your profile</span>
                            </div>
                            <div class="benefit-item">
                                <span class="benefit-icon">✓</span>
                                <span>Connect with professionals</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="auth-form">
                    <div class="form-section enhanced">
                        <div class="form-header">
                            <h1>Sign In</h1>
                            <p>Enter your credentials to access your account</p>
                        </div>
                        
                        <?php if ($login_error): ?>
                            <div class="alert error">
                                <span class="alert-icon">⚠️</span>
                                <?= $login_error ?>
                            </div>
                        <?php endif; ?>
                        
                        <form id="loginForm" action="process_login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required placeholder="your@email.com">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-container">
                                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                                    <button type="button" class="toggle-password">👁️</button>
                                </div>
                            </div>
                            
                            <div class="form-group remember-forgot">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="forgot-link">Forgot password?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-full">
                                <span>Sign In</span>
                                <i class="icon-arrow">→</i>
                            </button>
                        </form>
                        
                        <div class="auth-divider">
                            <span>or</span>
                        </div>
                        
                        <div class="social-login">
                            <button class="btn btn-social btn-google">
                                <span>🌐</span>
                                Continue with Google
                            </button>
                            <button class="btn btn-social btn-github">
                                <span>💻</span>
                                Continue with GitHub
                            </button>
                        </div>
                        
                        <div class="auth-footer">
                            <p>Don't have an account? <a href="register.php" class="auth-link">Create account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>