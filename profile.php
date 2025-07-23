<?php
$pageTitle = 'My Profile';
$pageDescription = 'View and manage your account information';
require_once 'includes/auth.php';
require_once 'includes/header.php';

// Get user data from session
$user = getCurrentUser();
if (!$user) {
    redirect('login.php');
}

// Check for success message
$contactSuccess = isset($_GET['contact_success']);
?>

<main class="container">
    <section class="profile-section">
        <h1>My Profile</h1>
        
        <?php if ($contactSuccess): ?>
            <div class="success-message">
                <p>Thank you for your message! We'll get back to you soon.</p>
            </div>
        <?php endif; ?>
        
        <div class="profile-card">
            <div class="profile-header">
                <div class="avatar"><?php echo strtoupper(substr($user['name'], 0, 1)); ?></div>
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($user['name']); ?></h2>
                    <p class="user-role">Member</p>
                </div>
            </div>
            
            <div class="profile-details">
                <div class="detail-item">
                    <strong>Email:</strong> 
                    <span><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
                
                <div class="detail-item">
                    <strong>User ID:</strong> 
                    <span><?php echo htmlspecialchars($user['id']); ?></span>
                </div>
                
                <?php if (isset($user['registration_date'])): ?>
                <div class="detail-item">
                    <strong>Member since:</strong> 
                    <span><?php echo date('F j, Y', strtotime($user['registration_date'])); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (isset($user['login_time'])): ?>
                <div class="detail-item">
                    <strong>Last login:</strong> 
                    <span><?php echo date('F j, Y g:i A', strtotime($user['login_time'])); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="profile-actions">
            <a href="contact.php" class="btn">Contact Us</a>
            <a href="#" onclick="return false;" class="btn btn-secondary">Edit Profile</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        
        <div class="profile-stats">
            <h3>Account Activity</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">1</span>
                    <span class="stat-label">Login Sessions</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">0</span>
                    <span class="stat-label">Messages Sent</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">Active</span>
                    <span class="stat-label">Account Status</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>