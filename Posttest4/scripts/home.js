// Light & Dark Mode
const themeToggleButton = document.getElementById('theme-toggle');
themeToggleButton.addEventListener('click', function() {
    if (!document.body.classList.contains('light-theme')) {
        document.body.classList.remove('dark-theme');
        document.body.classList.add('light-theme');
    } else {
        document.body.classList.remove('light-theme');
        document.body.classList.add('dark-theme');
    }
});

// Hamburger Menu
const hamburgerButton = document.getElementById('hamburger');
const navlinks = document.getElementById('nav-links');
hamburgerButton.addEventListener('click', function() {
    if (!navlinks.classList.contains('show')) {
        navlinks.classList.add('show');
    }
    else {
        navlinks.classList.remove('show');
    }
});

// Login PopUp
const loginButton = document.getElementById('login');
const loginPopup = document.getElementById('login-popup');
const closePopup = document.getElementById('close-popup');
const registerButton = document.getElementById('register');
const registerPopup = document.getElementById('register-popup');
const closeRegister = document.getElementById('close-register');

// Show login popup
loginButton.addEventListener('click', function() {
    loginPopup.style.display = 'block';
});
// Close login popup
closePopup.addEventListener('click', function() {
    loginPopup.style.display = 'none';
});
// Show register popup
registerButton.addEventListener('click', function() {
    loginPopup.style.display = 'none';
    registerPopup.style.display = 'block';
});
// Close register popup
closeRegister.addEventListener('click', function() {
    registerPopup.style.display = 'none';
});
// Submit
const loginForm = document.getElementById('login-form');
loginForm.addEventListener('submit', function(event) {
    alert('Login Successful!');
    loginPopup.style.display = 'none';
});
const registerForm = document.getElementById('register-form');
registerForm.addEventListener('submit', function(event) {
    alert('Registration Successful!');
    registerPopup.style.display = 'none';
});


// Review Gallery
const reviewButtons = document.querySelectorAll('.review');
const reviewPopup = document.getElementById('review-popup');
const closeReviewPopup = document.getElementById('close-review-popup');

reviewButtons.forEach(button => {   
    button.addEventListener('click', function() {
        const card = this.closest('.card');
        const productName = card.querySelector('.info p').textContent;
        const reviewProductName = document.getElementById('review-product-name');
        reviewProductName.textContent = productName;
        reviewPopup.style.display = 'block';
    });
});

closeReviewPopup.addEventListener('click', function() {
    reviewPopup.style.display = 'none';
});

// Save Review
const reviewForm = document.getElementById('review-form');
reviewForm.addEventListener('submit', function(event) {
    event.preventDefault();
    reviewPopup.style.display = 'none';
});