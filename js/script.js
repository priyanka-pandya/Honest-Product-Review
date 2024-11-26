const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');

// Event listeners for switching between Sign In and Sign Up
signUpButton.addEventListener('click', () => {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
    signUpButton.classList.add('active');
    signInButton.classList.remove('active');
});

signInButton.addEventListener('click', () => {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
    signInButton.classList.add('active');
    signUpButton.classList.remove('active');
});

// Default state to show Sign In form on page load
signInForm.style.display = "block";
signUpForm.style.display = "none";
signInButton.classList.add('active');
