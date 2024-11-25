// This file was written by Jiu Cheng
// DOM Elements
const loginForm = document.querySelector("#login-form");
const registerForm = document.querySelector("#register-form");

// Validation Messages
const defaultMsg = "";
const emailErrorMsg = "Please enter a valid email address.";
const passwordErrorMsg = "Password cannot be empty.";
const passwordMatchErrorMsg = "Passwords do not match.";
const nameErrorMsg = "Name cannot be empty.";

// Utility: Add or Clear Error Messages
function displayError(element, message) {
    let errorElement = element.nextElementSibling;

    // Check if the error element exists and is associated with the input field
    if (errorElement && errorElement.classList.contains("warning")) {
        // Update existing error message
        errorElement.textContent = message;
    } else {
        // Create new error element
        errorElement = document.createElement("p");
        errorElement.className = "warning";
        errorElement.textContent = message;
        element.parentNode.insertBefore(errorElement, element.nextSibling);
    }
}

function clearError(element) {
    const errorElement = element.nextElementSibling;
    if (errorElement && errorElement.classList.contains("warning")) {
        errorElement.textContent = defaultMsg;
    }
}

// Validation Functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[A-Za-z]{2,}$/;
    return emailRegex.test(email);
}

function validatePassword(password) {
    return password.trim() !== "";
}

function validateName(name) {
    return name.trim() !== "";
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
    const name = registerForm.querySelector("#register-name");
    const email = registerForm.querySelector("#register-email");
    const password = registerForm.querySelector("#register-password");
    const confirmPassword = registerForm.querySelector("#register-password-again");

    let isValid = true;

    // Validate Name
    if (!validateName(name.value)) {
        displayError(name, nameErrorMsg);
        isValid = false;
    } else {
        clearError(name);
    }

    // Validate Email
    if (!validateEmail(email.value)) {
        displayError(email, emailErrorMsg);
        isValid = false;
    } else {
        clearError(email);
    }

    // Validate Password
    if (!validatePassword(password.value)) {
        displayError(password, passwordErrorMsg);
        isValid = false;
    } else {
        clearError(password);
    }

    // Validate Confirm Password
    if (password.value !== confirmPassword.value || confirmPassword.value.trim() === "") {
        displayError(confirmPassword, passwordMatchErrorMsg);
        isValid = false;
    } else {
        clearError(confirmPassword);
    }

    if (!isValid) e.preventDefault();
}

// Real-Time Validation on 'blur' for Name and Email Fields
if (registerForm) {
    const name = registerForm.querySelector("#register-name");
    const email = registerForm.querySelector("#register-email");

    // Real-Time Validation for Name on 'blur'
    name.addEventListener("blur", () => {
        if (!validateName(name.value)) {
            displayError(name, nameErrorMsg);
        } else {
            clearError(name);
        }
    });

    // Real-Time Validation for Email on 'blur'
    email.addEventListener("blur", () => {
        if (!validateEmail(email.value)) {
            displayError(email, emailErrorMsg);
        } else {
            clearError(email);
        }
    });
}

// Attach Event Listeners
if (loginForm) loginForm.addEventListener("submit", validateLoginForm);
if (registerForm) registerForm.addEventListener("submit", validateRegisterForm);
