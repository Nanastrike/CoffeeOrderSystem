// DOM Elements
const loginForm = document.querySelector("#login-form");
const registerForm = document.querySelector("#register-form");

// Validation Messages
const defaultMsg = "";
const emailErrorMsg = "Please enter a valid email address.";
const passwordErrorMsg = "Password cannot be empty.";
const termsErrorMsg = "You must accept the terms.";

// Utility: Add or Clear Error Messages
function displayError(element, message) {
    let errorElement = element.nextElementSibling;
    if (!errorElement || !errorElement.classList.contains("warning")) {
        errorElement = document.createElement("p");
        errorElement.className = "warning";
        element.parentElement.appendChild(errorElement);
    }
    errorElement.textContent = message;
}

function clearError(element) {
    const errorElement = element.nextElementSibling;
    if (errorElement && errorElement.classList.contains("warning")) {
        errorElement.textContent = defaultMsg;
    }
}

// Validation Functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePassword(password) {
    return password.trim() !== "";
}

// Form Validation for Login
function validateLoginForm(e) {
    const email = loginForm.querySelector("#login-email");
    const password = loginForm.querySelector("#login-password");

    let isValid = true;

    if (!validateEmail(email.value)) {
        displayError(email, emailErrorMsg);
        isValid = false;
    } else {
        clearError(email);
    }

    if (!validatePassword(password.value)) {
        displayError(password, passwordErrorMsg);
        isValid = false;
    } else {
        clearError(password);
    }

    if (!isValid) e.preventDefault();
}

// Form Validation for Register
function validateRegisterForm(e) {
    const email = registerForm.querySelector("#register-email");
    const password = registerForm.querySelector("#register-password");
    const confirmPassword = registerForm.querySelector("#confirm-password");
  //const terms = registerForm.querySelector("#terms");

    let isValid = true;

    if (!validateEmail(email.value)) {
        displayError(email, emailErrorMsg);
        isValid = false;
    } else {
        clearError(email);
    }

    if (!validatePassword(password.value)) {
        displayError(password, passwordErrorMsg);
        isValid = false;
    } else {
        clearError(password);
    }

    if (password.value !== confirmPassword.value) {
        displayError(confirmPassword, "Passwords do not match.");
        isValid = false;
    } else {
        clearError(confirmPassword);
    }

/*  if (!terms.checked) {
        displayError(terms, termsErrorMsg);
        isValid = false;
    } else {
        clearError(terms);
    }
*/
    if (!isValid) e.preventDefault();
} 


// Attach Event Listeners
if (loginForm) loginForm.addEventListener("submit", validateLoginForm);
if (registerForm) registerForm.addEventListener("submit", validateRegisterForm);
