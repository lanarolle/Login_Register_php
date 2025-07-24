<?php
include_once 'includes/config.php';
include 'includes/header.php';
$page_title = 'Register';
?>

<main>
    <!-- Register Hero Section -->
    <section class="auth-hero">
        <div class="container">
            <div class="auth-content reverse">
                <div class="auth-form">
                    <div class="form-section enhanced">
                        <div class="form-header">
                            <h1>Create Account</h1>
                            <p>Join DevConnect and start building your professional network</p>
                        </div>
                        
                        <form id="registerForm" action="process_register.php" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required placeholder="your@email.com">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-container">
                                    <input type="password" id="password" name="password" required minlength="8" placeholder="Create a strong password">
                                    <button type="button" class="toggle-password">👁️</button>
                                </div>
                                <div class="password-requirements">
                                    <small>Password must contain:</small>
                                    <ul class="requirements-list">
                                        <li>At least 8 characters</li>
                                        <li>One uppercase letter</li>
                                        <li>One lowercase letter</li>
                                        <li>One number</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="password-container">
                                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                                    <button type="button" class="toggle-password">👁️</button>
                                </div>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="terms" name="terms" required>
                                <label for="terms">I agree to the <a href="#" class="terms-link">Terms of Service</a> and <a href="#" class="terms-link">Privacy Policy</a></label>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <label for="newsletter">Send me updates about new features and opportunities</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-full">
                                <span>Create Account</span>
                                <i class="icon-arrow">→</i>
                            </button>
                        </form>
                        
                        <div class="auth-divider">
                            <span>or</span>
                        </div>
                        
                        <div class="social-login">
                            <button class="btn btn-social btn-google">
                                <span>🌐</span>
                                Sign up with Google
                            </button>
                            <button class="btn btn-social btn-github">
                                <span>💻</span>
                                Sign up with GitHub
                            </button>
                        </div>
                        
                        <div class="auth-footer">
                            <p>Already have an account? <a href="login.php" class="auth-link">Sign in</a></p>
                        </div>
                    </div>
                </div>
                
                <div class="auth-image">
                    <div class="auth-illustration">
                        <div class="illustration-bg register">
                            <div class="floating-icon">👥</div>
                            <div class="floating-icon">🎯</div>
                            <div class="floating-icon">⭐</div>
                        </div>
                        <h2>Join Our Community</h2>
                        <p>Connect with thousands of professionals and accelerate your career growth.</p>
                        <div class="auth-stats">
                            <div class="stat-item">
                                <span class="stat-number">10K+</span>
                                <span class="stat-label">Active Members</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">95%</span>
                                <span class="stat-label">Success Rate</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>