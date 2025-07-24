<?php
include 'includes/auth.php'; // Check if user is logged in
include 'includes/config.php';
include 'includes/header.php';
$page_title = 'Contact Us';
?>

<main>
    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-header">
                <h1>Get in Touch</h1>
                <p>We're here to help you succeed. Reach out to our team for support, feedback, or partnership opportunities.</p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-content">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Information -->
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <div class="icon-circle blue">📧</div>
                        </div>
                        <h3>Email Support</h3>
                        <p>Get help from our support team</p>
                        <a href="mailto:support@devconnect.com" class="contact-link">support@devconnect.com</a>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <div class="icon-circle green">💬</div>
                        </div>
                        <h3>Live Chat</h3>
                        <p>Chat with us in real-time</p>
                        <button class="contact-link chat-btn">Start Chat</button>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <div class="icon-circle purple">📱</div>
                        </div>
                        <h3>Phone</h3>
                        <p>Call us during business hours</p>
                        <a href="tel:+1234567890" class="contact-link">+1 (234) 567-890</a>
                    </div>
                    
                    <div class="contact-hours">
                        <h4>Business Hours</h4>
                        <div class="hours-list">
                            <div class="hours-item">
                                <span>Monday - Friday</span>
                                <span>9:00 AM - 6:00 PM EST</span>
                            </div>
                            <div class="hours-item">
                                <span>Saturday</span>
                                <span>10:00 AM - 4:00 PM EST</span>
                            </div>
                            <div class="hours-item">
                                <span>Sunday</span>
                                <span>Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form-container">
                    <div class="form-section enhanced">
                        <div class="form-header">
                            <h2>Send us a Message</h2>
                            <p>Fill out the form below and we'll get back to you within 24 hours</p>
                        </div>
                        
                        <form id="contactForm" action="process_contact.php" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" id="name" name="name" required placeholder="Enter your full name" value="<?= isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']['name']) : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required placeholder="your@email.com" value="<?= isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']['email']) : '' ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="support">Technical Support</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="bug">Bug Report</option>
                                    <option value="feature">Feature Request</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="priority">Priority Level</label>
                                <select id="priority" name="priority" required>
                                    <option value="low">Low - General question</option>
                                    <option value="medium" selected>Medium - Standard inquiry</option>
                                    <option value="high">High - Urgent issue</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="6" required placeholder="Please describe your inquiry in detail..."></textarea>
                                <div class="character-count">
                                    <span id="charCount">0</span> / 1000 characters
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="rating">Rate Your Experience (Optional)</label>
                                <div class="rating-input">
                                    <div class="stars-input">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label for="star5" title="5 stars">⭐</label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label for="star4" title="4 stars">⭐</label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label for="star3" title="3 stars">⭐</label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label for="star2" title="2 stars">⭐</label>
                                        <input type="radio" id="star1" name="rating" value="1">
                                        <label for="star1" title="1 star">⭐</label>
                                    </div>
                                    <span class="rating-text">How would you rate your experience with DevConnect?</span>
                                </div>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <label for="newsletter">Subscribe to our newsletter for updates and tips</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-full">
                                <span>Send Message</span>
                                <i class="icon-send">✈️</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Find quick answers to common questions</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>How do I reset my password?</h4>
                    <p>Click on "Forgot password?" on the login page and follow the instructions sent to your email.</p>
                </div>
                <div class="faq-item">
                    <h4>Is my data secure?</h4>
                    <p>Yes, we use enterprise-grade encryption and security measures to protect your information.</p>
                </div>
                <div class="faq-item">
                    <h4>How do I update my profile?</h4>
                    <p>Go to your profile page and click the "Edit Profile" button to make changes.</p>
                </div>
                <div class="faq-item">
                    <h4>Can I delete my account?</h4>
                    <p>Yes, you can delete your account from the account settings page. This action is irreversible.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>