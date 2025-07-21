<?php
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="container">
    <section class="form-section">
        <h1>Create an Account</h1>
        <form id="registerForm" action="processes/process_register.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required minlength="8">
                    <button type="button" class="toggle-password">👁️</button>
                </div>
                <small>Password must be at least 8 characters</small>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>