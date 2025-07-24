<?php
include 'includes/auth.php'; // Check if user is logged in
include_once 'includes/config.php';
include 'includes/header.php';

// Hardcoded user data for demonstration - in real app, fetch from database
$user = [
    'name' => isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : 'John Doe',
    'email' => isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : 'john@example.com',
    'registration_date' => '2023-05-15',
    'bio' => 'Full Stack Developer passionate about creating innovative web solutions.',
    'location' => 'San Francisco, CA',
    'skills' => ['PHP', 'JavaScript', 'React', 'Node.js', 'MySQL', 'CSS3'],
    'connections' => 127,
    'projects' => 15,
    'experience' => '5+ years'
];
$page_title = 'My Profile';
?>

<main>
    <!-- Profile Hero Section -->
    <section class="profile-hero">
        <div class="container">
            <div class="profile-hero-content">
                <div class="profile-cover">
                    <div class="cover-pattern"></div>
                    <button class="edit-cover-btn">📷 Edit Cover</button>
                </div>
                <div class="profile-main">
                    <div class="profile-avatar-section">
                        <div class="avatar-container">
                            <div class="avatar large"><?= strtoupper(substr($user['name'], 0, 1)) ?></div>
                            <button class="edit-avatar-btn">📷</button>
                        </div>
                        <div class="profile-basic-info">
                            <h1><?= htmlspecialchars($user['name']) ?></h1>
                            <p class="profile-title"><?= htmlspecialchars($user['bio']) ?></p>
                            <div class="profile-meta">
                                <span class="location">📍 <?= htmlspecialchars($user['location']) ?></span>
                                <span class="experience">💼 <?= htmlspecialchars($user['experience']) ?></span>
                            </div>
                        </div>
                        <div class="profile-actions">
                            <button class="btn btn-primary">
                                <span>Edit Profile</span>
                                <i>✏️</i>
                            </button>
                            <button class="btn btn-outline">
                                <span>Share Profile</span>
                                <i>🔗</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Content -->
    <section class="profile-content">
        <div class="container">
            <div class="profile-grid">
                <!-- Left Column -->
                <div class="profile-sidebar">
                    <!-- Profile Stats -->
                    <div class="profile-card stats-card">
                        <h3>Profile Stats</h3>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <span class="stat-number"><?= $user['connections'] ?></span>
                                <span class="stat-label">Connections</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?= $user['projects'] ?></span>
                                <span class="stat-label">Projects</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">4.9</span>
                                <span class="stat-label">Rating</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Profile Complete</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="profile-card contact-card">
                        <h3>Contact Information</h3>
                        <div class="contact-info">
                            <div class="contact-item">
                                <span class="contact-icon">📧</span>
                                <div class="contact-details">
                                    <label>Email</label>
                                    <span><?= htmlspecialchars($user['email']) ?></span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <span class="contact-icon">📅</span>
                                <div class="contact-details">
                                    <label>Member Since</label>
                                    <span><?= date('F Y', strtotime($user['registration_date'])) ?></span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <span class="contact-icon">🌐</span>
                                <div class="contact-details">
                                    <label>Website</label>
                                    <a href="#" class="profile-link">portfolio.johndoe.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="profile-card skills-card">
                        <h3>Skills & Technologies</h3>
                        <div class="skills-list">
                            <?php foreach ($user['skills'] as $skill): ?>
                                <span class="skill-tag"><?= htmlspecialchars($skill) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <button class="btn btn-text">+ Add Skill</button>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="profile-main-content">
                    <!-- About Section -->
                    <div class="profile-card about-card">
                        <div class="card-header">
                            <h3>About</h3>
                            <button class="btn btn-text">Edit</button>
                        </div>
                        <div class="about-content">
                            <p>Passionate Full Stack Developer with 5+ years of experience building scalable web applications. Specialized in modern JavaScript frameworks, PHP, and cloud technologies. Always eager to learn new technologies and collaborate on innovative projects.</p>
                            <p>I enjoy solving complex problems and creating user-friendly solutions that make a difference. When I'm not coding, you can find me contributing to open-source projects or mentoring aspiring developers.</p>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="profile-card activity-card">
                        <div class="card-header">
                            <h3>Recent Activity</h3>
                            <button class="btn btn-text">View All</button>
                        </div>
                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-icon">🎉</div>
                                <div class="activity-content">
                                    <p><strong>Completed project milestone</strong></p>
                                    <span class="activity-time">2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">👥</div>
                                <div class="activity-content">
                                    <p><strong>Connected with 3 new professionals</strong></p>
                                    <span class="activity-time">1 day ago</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">📝</div>
                                <div class="activity-content">
                                    <p><strong>Updated profile information</strong></p>
                                    <span class="activity-time">3 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="profile-card projects-card">
                        <div class="card-header">
                            <h3>Featured Projects</h3>
                            <button class="btn btn-text">Add Project</button>
                        </div>
                        <div class="projects-grid">
                            <div class="project-item">
                                <div class="project-image">
                                    <div class="project-placeholder">🚀</div>
                                </div>
                                <div class="project-info">
                                    <h4>E-Commerce Platform</h4>
                                    <p>Full-stack e-commerce solution built with React and Node.js</p>
                                    <div class="project-tags">
                                        <span class="tag">React</span>
                                        <span class="tag">Node.js</span>
                                        <span class="tag">MongoDB</span>
                                    </div>
                                </div>
                            </div>
                            <div class="project-item">
                                <div class="project-image">
                                    <div class="project-placeholder">📱</div>
                                </div>
                                <div class="project-info">
                                    <h4>Task Management App</h4>
                                    <p>Collaborative task management tool with real-time updates</p>
                                    <div class="project-tags">
                                        <span class="tag">Vue.js</span>
                                        <span class="tag">Socket.io</span>
                                        <span class="tag">MySQL</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="profile-card actions-card">
                        <h3>Quick Actions</h3>
                        <div class="quick-actions">
                            <a href="contact.php" class="action-btn">
                                <span class="action-icon">💬</span>
                                <div class="action-content">
                                    <span class="action-title">Contact Support</span>
                                    <span class="action-desc">Get help from our team</span>
                                </div>
                            </a>
                            <a href="#" class="action-btn">
                                <span class="action-icon">📊</span>
                                <div class="action-content">
                                    <span class="action-title">View Analytics</span>
                                    <span class="action-desc">Track your profile performance</span>
                                </div>
                            </a>
                            <a href="#" class="action-btn">
                                <span class="action-icon">⚙️</span>
                                <div class="action-content">
                                    <span class="action-title">Account Settings</span>
                                    <span class="action-desc">Manage your preferences</span>
                                </div>
                            </a>
                            <a href="logout.php" class="action-btn logout">
                                <span class="action-icon">🚪</span>
                                <div class="action-content">
                                    <span class="action-title">Logout</span>
                                    <span class="action-desc">Sign out of your account</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>