<?php
include_once 'includes/config.php';
include 'includes/header.php';
?>

<main>
    <!-- Hero Section with Enhanced Design -->
    <section class="hero-enhanced">
        <div class="hero-background">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">
                        <span class="hero-title-main">Welcome to DevConnect</span>
                        <span class="hero-title-sub">Your Gateway to Professional Development</span>
                    </h1>
                    <p class="hero-description">
                        Join thousands of developers, designers, and tech enthusiasts in building the future. 
                        Create your profile, showcase your skills, and connect with like-minded professionals.
                    </p>
                    <div class="cta-buttons">
                        <a href="register.php" class="btn btn-primary">
                            <span>Start Your Journey</span>
                            <i class="icon-arrow">→</i>
                        </a>
                        <a href="login.php" class="btn btn-outline">
                            <span>Sign In</span>
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Active Users</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Countries</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with Icons and Enhanced Design -->
    <section class="features-enhanced">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose DevConnect?</h2>
                <p>Discover the powerful features that make our platform the perfect choice for your professional growth</p>
            </div>
            <div class="features-grid">
                <div class="feature-card enhanced">
                    <div class="feature-icon">
                        <div class="icon-circle blue">👤</div>
                    </div>
                    <h3>Professional Profiles</h3>
                    <p>Create a stunning profile that showcases your skills, experience, and achievements. Stand out from the crowd with our intuitive profile builder.</p>
                    <div class="feature-benefits">
                        <span>✓ Customizable layouts</span>
                        <span>✓ Portfolio integration</span>
                        <span>✓ Skills verification</span>
                    </div>
                </div>
                <div class="feature-card enhanced">
                    <div class="feature-icon">
                        <div class="icon-circle green">🔒</div>
                    </div>
                    <h3>Enterprise Security</h3>
                    <p>Your data is protected with bank-level security. Advanced encryption, secure authentication, and privacy controls keep your information safe.</p>
                    <div class="feature-benefits">
                        <span>✓ End-to-end encryption</span>
                        <span>✓ Two-factor authentication</span>
                        <span>✓ GDPR compliant</span>
                    </div>
                </div>
                <div class="feature-card enhanced">
                    <div class="feature-icon">
                        <div class="icon-circle purple">💬</div>
                    </div>
                    <h3>Smart Communication</h3>
                    <p>Connect with our team and community through intelligent contact forms, real-time messaging, and dedicated support channels.</p>
                    <div class="feature-benefits">
                        <span>✓ Instant notifications</span>
                        <span>✓ Smart filtering</span>
                        <span>✓ Multi-language support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Users Say</h2>
                <p>Join thousands of satisfied professionals who have transformed their careers with DevConnect</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p>"DevConnect helped me showcase my skills and land my dream job. The platform is intuitive and professional."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SJ</div>
                        <div class="author-info">
                            <span class="author-name">Sarah Johnson</span>
                            <span class="author-role">Full Stack Developer</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p>"The security features give me peace of mind. I can focus on networking without worrying about my data."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MC</div>
                        <div class="author-info">
                            <span class="author-name">Mike Chen</span>
                            <span class="author-role">UX Designer</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p>"Best platform for professional networking. The contact system is seamless and the support is amazing."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">EL</div>
                        <div class="author-info">
                            <span class="author-name">Emily Lopez</span>
                            <span class="author-role">Product Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Transform Your Career?</h2>
                <p>Join DevConnect today and unlock unlimited opportunities for professional growth and networking.</p>
                <div class="cta-buttons-bottom">
                    <a href="register.php" class="btn btn-large btn-primary">Get Started Free</a>
                    <a href="contact.php" class="btn btn-large btn-outline">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>