document.addEventListener('DOMContentLoaded', function() {
    // Password toggle functionality
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🔒';
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Check required fields
            const requiredFields = this.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });
            
            // Specific validation for registration form
            if (this.id === 'registerForm') {
                const password = this.querySelector('#password');
                const confirmPassword = this.querySelector('#confirm_password');
                
                if (password.value.length < 8) {
                    isValid = false;
                    password.classList.add('error');
                } else {
                    password.classList.remove('error');
                }
                
                if (password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.classList.add('error');
                } else {
                    confirmPassword.classList.remove('error');
                }
            }
            
            // Specific validation for contact form
            if (this.id === 'contactForm') {
                const rating = this.querySelector('#rating');
                if (rating.value < 1 || rating.value > 5) {
                    isValid = false;
                    rating.classList.add('error');
                } else {
                    rating.classList.remove('error');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill out all required fields correctly.');
            } else {
                // Show success message
                alert('Form submitted successfully!');
            }
        });
    });
    
    // Theme toggle (optional)
    const themeToggle = document.createElement('button');
    themeToggle.textContent = '🌓 Toggle Theme';
    themeToggle.classList.add('btn', 'theme-toggle');
    themeToggle.style.position = 'fixed';
    themeToggle.style.bottom = '20px';
    themeToggle.style.right = '20px';
    themeToggle.style.zIndex = '1000';
    
    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    });
    
    // Check for saved theme preference
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
    
    document.body.appendChild(themeToggle);
});