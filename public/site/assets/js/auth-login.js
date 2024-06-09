// Selecting the correct elements based on your HTML structure
const signUpBtn = document.getElementById('sign-up');
const signInBtn = document.getElementById('sign-in');
const signInForm = document.getElementById('login-in');
const signUpForm = document.getElementById('login-up');

// Event listener to switch to the sign-up form
signUpBtn.addEventListener('click', () => {
    signInForm.classList.add('none');
    signUpForm.classList.remove('none');
});

// Event listener to switch to the sign-in form
signInBtn.addEventListener('click', () => {
    signUpForm.classList.add('none');
    signInForm.classList.remove('none');
});
