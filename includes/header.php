<?php
require_once 'includes/config.php';
$currentUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'WebDev Assignment - A demonstration website'; ?>">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><?php echo SITE_NAME; ?></div>
            <ul class="nav-links">
                <li><a href="index.php" <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'class="active"' : ''; ?>>Home</a></li>
                <?php if ($currentUser): ?>
                    <li><a href="profile.php" <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'class="active"' : ''; ?>>Profile</a></li>
                    <li><a href="contact.php" <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'class="active"' : ''; ?>>Contact</a></li>
                    <li><a href="logout.php">Logout (<?php echo htmlspecialchars($currentUser['name']); ?>)</a></li>
                <?php else: ?>
                    <li><a href="register.php" <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'class="active"' : ''; ?>>Register</a></li>
                    <li><a href="login.php" <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'class="active"' : ''; ?>>Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <?php 
    // Display flash messages
    $flashMessages = getFlashMessages();
    if (!empty($flashMessages)): 
    ?>
        <div class="flash-messages">
            <?php foreach ($flashMessages as $flash): ?>
                <div class="flash-message flash-<?php echo $flash['type']; ?>">
                    <?php echo htmlspecialchars($flash['message']); ?>
                    <button class="close-flash" onclick="this.parentElement.remove()">×</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>