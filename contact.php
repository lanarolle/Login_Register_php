<?php
$pageTitle = 'Contact Us';
$pageDescription = 'Send us your feedback and questions';
require_once 'includes/auth.php';
require_once 'includes/header.php';

// Ensure user is logged in
$user = getCurrentUser();
if (!$user) {
    redirect('login.php');
}
?>

<main class="container">
    <section class="form-section">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Send us your feedback, questions, or suggestions.</p>
        
        <form id="contactForm" action="process_contact.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
            
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required readonly 
                       value="<?php echo htmlspecialchars($user['name']); ?>">
                <small>Your name from your profile</small>
            </div>
            
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required readonly 
                       value="<?php echo htmlspecialchars($user['email']); ?>">
                <small>Your email from your profile</small>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <select id="subject" name="subject" required>
                    <option value="">Choose a subject...</option>
                    <option value="general">General Inquiry</option>
                    <option value="technical">Technical Support</option>
                    <option value="feedback">Feedback</option>
                    <option value="bug">Bug Report</option>
                    <option value="feature">Feature Request</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required 
                          placeholder="Please describe your message in detail..." 
                          minlength="10" maxlength="1000"></textarea>
                <small>10-1000 characters</small>
            </div>
            
            <div class="form-group">
                <label for="rating">Rate your experience (1-5)</label>
                <div class="rating-container">
                    <input type="range" id="rating" name="rating" min="1" max="5" value="5" required>
                    <span class="rating-display">5</span>
                </div>
                <small>1 = Poor, 5 = Excellent</small>
            </div>
            
            <div class="form-group">
                <label for="priority">Priority Level</label>
                <select id="priority" name="priority" required>
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            
            <button type="submit" class="btn">Send Message</button>
        </form>
        
        <div class="contact-info">
            <h3>Other Ways to Reach Us</h3>
            <p><strong>Email:</strong> contact@webdevassignment.com</p>
            <p><strong>Phone:</strong> +1 (555) 123-4567</p>
            <p><strong>Office Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM EST</p>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>