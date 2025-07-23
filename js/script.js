document.addEventListener('DOMContentLoaded', function() {
    
    // Auto-hide flash messages after 5 seconds
    const flashMessages = document.querySelectorAll('.flash-message');
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.animation = 'slideOut 0.3s ease forwards';
            setTimeout(() => {
                message.remove();
            }, 300);
        }, 5000);
    });

    // Password toggle functionality
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    });
    
    // Rating slider functionality
    const ratingSlider = document.getElementById('rating');
    const ratingDisplay = document.querySelector('.rating-display');
    
    if (ratingSlider && ratingDisplay) {
        ratingSlider.addEventListener('input', function() {
            ratingDisplay.textContent = this.value;
            
            // Change color based on rating
            const colors = {
                '1': '#e74c3c',
                '2': '#e67e22',
                '3': '#f39c12',
                '4': '#2ecc71',
                '5': '#27ae60'
            };
            ratingDisplay.style.color = colors[this.value] || '#3498db';
        });
    }
    
    // Form validation
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const errors = [];
            
            // Check required fields
            const requiredFields = this.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    errors.push(`${field.previousElementSibling.textContent} is required.`);
                } else {
                    field.classList.remove('error');
                }
            });
            
            // Specific validation for registration form
            if (this.id === 'registerForm') {
                const name = this.querySelector('#name');
                const email = this.querySelector('#email');
                const password = this.querySelector('#password');
                const confirmPassword = this.querySelector('#confirm_password');
                const terms = this.querySelector('input[name="terms"]');
                
                // Name validation
                if (name && (name.value.length < 2 || name.value.length > 100)) {
                    isValid = false;
                    name.classList.add('error');
                    errors.push('Name must be between 2 and 100 characters.');
                }
                
                // Email validation
                if (email && !isValidEmail(email.value)) {
                    isValid = false;
                    email.classList.add('error');
                    errors.push('Please enter a valid email address.');
                }
                
                // Password validation
                if (password && password.value.length < 8) {
                    isValid = false;
                    password.classList.add('error');
                    errors.push('Password must be at least 8 characters long.');
                } else if (password) {
                    password.classList.remove('error');
                }
                
                // Confirm password validation
                if (password && confirmPassword && password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.classList.add('error');
                    errors.push('Passwords do not match.');
                } else if (confirmPassword) {
                    confirmPassword.classList.remove('error');
                }
                
                // Terms validation
                if (terms && !terms.checked) {
                    isValid = false;
                    errors.push('You must accept the terms and conditions.');
                }
            }
            
            // Specific validation for login form
            if (this.id === 'loginForm') {
                const email = this.querySelector('#email');
                
                if (email && !isValidEmail(email.value)) {
                    isValid = false;
                    email.classList.add('error');
                    errors.push('Please enter a valid email address.');
                }
            }
            
            // Specific validation for contact form
            if (this.id === 'contactForm') {
                const subject = this.querySelector('#subject');
                const message = this.querySelector('#message');
                const rating = this.querySelector('#rating');
                
                if (subject && !subject.value) {
                    isValid = false;
                    subject.classList.add('error');
                    errors.push('Please select a subject.');
                }
                
                if (message && (message.value.length < 10 || message.value.length > 1000)) {
                    isValid = false;
                    message.classList.add('error');
                    errors.push('Message must be between 10 and 1000 characters.');
                }
                
                if (rating && (rating.value < 1 || rating.value > 5)) {
                    isValid = false;
                    rating.classList.add('error');
                    errors.push('Rating must be between 1 and 5.');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                showValidationErrors(errors);
                return false;
            }
            
            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Processing...';
                submitButton.disabled = true;
                
                // Re-enable button after 3 seconds in case form doesn't submit
                setTimeout(() => {
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }, 3000);
            }
        });
        
        // Real-time validation for better UX
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    validateField(this);
                }
            });
        });
    });
    
    // Theme toggle functionality
    const themeToggle = document.createElement('button');
    themeToggle.textContent = '🌓 Toggle Theme';
    themeToggle.classList.add('btn', 'theme-toggle');
    
    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDarkMode);
        this.textContent = isDarkMode ? '☀️ Light Mode' : '🌓 Dark Mode';
    });
    
    // Check for saved theme preference
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
        themeToggle.textContent = '☀️ Light Mode';
    }
    
    document.body.appendChild(themeToggle);
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Enhanced form experience
    addFormEnhancements();
});

// Helper functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    
    // Remove existing error class
    field.classList.remove('error');
    
    // Check if field is required and empty
    if (field.hasAttribute('required') && !value) {
        isValid = false;
    }
    
    // Specific field validations
    switch (field.type) {
        case 'email':
            if (value && !isValidEmail(value)) {
                isValid = false;
            }
            break;
        case 'password':
            if (field.hasAttribute('minlength') && value.length < parseInt(field.getAttribute('minlength'))) {
                isValid = false;
            }
            break;
        case 'number':
        case 'range':
            const min = field.getAttribute('min');
            const max = field.getAttribute('max');
            const numValue = parseInt(value);
            if ((min && numValue < parseInt(min)) || (max && numValue > parseInt(max))) {
                isValid = false;
            }
            break;
    }
    
    // Text length validations
    if (field.hasAttribute('minlength') && value.length < parseInt(field.getAttribute('minlength'))) {
        isValid = false;
    }
    
    if (field.hasAttribute('maxlength') && value.length > parseInt(field.getAttribute('maxlength'))) {
        isValid = false;
    }
    
    if (!isValid) {
        field.classList.add('error');
    }
    
    return isValid;
}

function showValidationErrors(errors) {
    // Remove existing error display
    const existingError = document.querySelector('.validation-errors');
    if (existingError) {
        existingError.remove();
    }
    
    if (errors.length > 0) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'validation-errors error-message';
        errorDiv.innerHTML = '<h4>Please fix the following errors:</h4><ul>' + 
            errors.map(error => `<li>${error}</li>`).join('') + '</ul>';
        
        const form = document.querySelector('form');
        if (form) {
            form.insertBefore(errorDiv, form.firstChild);
            errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
}

function addFormEnhancements() {
    // Add character counter for textareas
    const textareas = document.querySelectorAll('textarea[maxlength]');
    textareas.forEach(textarea => {
        const maxLength = textarea.getAttribute('maxlength');
        const counter = document.createElement('div');
        counter.className = 'char-counter';
        counter.style.textAlign = 'right';
        counter.style.fontSize = '0.8rem';
        counter.style.color = '#666';
        counter.style.marginTop = '5px';
        
        const updateCounter = () => {
            const remaining = maxLength - textarea.value.length;
            counter.textContent = `${textarea.value.length}/${maxLength} characters`;
            counter.style.color = remaining < 50 ? '#e74c3c' : '#666';
        };
        
        textarea.addEventListener('input', updateCounter);
        textarea.parentNode.appendChild(counter);
        updateCounter();
    });
    
    // Add loading animation to forms
    const submitButtons = document.querySelectorAll('button[type="submit"]');
    submitButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.style.position = 'relative';
            this.innerHTML = '<span style="opacity: 0.7;">Processing...</span>';
        });
    });
}

// Add CSS for slideOut animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .validation-errors ul {
        margin: 10px 0 0 20px;
    }
    
    .validation-errors li {
        margin-bottom: 5px;
    }
    
    .char-counter {
        font-size: 0.8rem;
        color: #666;
        text-align: right;
        margin-top: 5px;
    }
`;
document.head.appendChild(style);