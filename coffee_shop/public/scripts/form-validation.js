// This file is written by Jiu Cheng
// Select input elements
let nameInput = document.querySelector("#register-name");
let emailInput = document.querySelector("#register-email");
let passwordInput = document.querySelector("#register-password");
let confirmPasswordInput = document.querySelector("#register-password-again");

// Create paragraph elements to display error messages and assign the class "warning"
let nameError = document.createElement('p');
nameError.setAttribute("class", "warning");

let emailError = document.createElement('p');
emailError.setAttribute("class", "warning");

let passwordError = document.createElement('p');
passwordError.setAttribute("class", "warning");

let confirmPasswordError = document.createElement('p');
confirmPasswordError.setAttribute("class", "warning");

// Append error message elements directly after the input fields
nameInput.insertAdjacentElement('afterend', nameError); // Name field
emailInput.insertAdjacentElement('afterend', emailError); // Email field
passwordInput.insertAdjacentElement('afterend', passwordError); // Password field
confirmPasswordInput.insertAdjacentElement('afterend', confirmPasswordError); // Confirm Password field

// Define global variables for error messages and default message
let defaultMsg = "";
let nameErrorMsg = "Name cannot be empty.";
let emailErrorMsg = "Invalid email address.";
let passwordErrorMsg = "Password cannot be empty.";
let confirmPasswordErrorMsg = "Passwords do not match.";

// Validation functions
function validateName() {
    let name = nameInput.value.trim(); // Remove whitespace
    if (name == "") {
        error = nameErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}

function validateEmail() {
    let email = emailInput.value.trim();
    // Use a regex that prohibits numbers after the dot
    let regexp = /^[^\s@]+@[^\s@]+\.[A-Za-z]{2,}$/;
    if (regexp.test(email)) {
        error = defaultMsg;
    } else {
        error = emailErrorMsg;
    }
    return error;
}

function validatePassword() {
    let password = passwordInput.value;
    if (password == "") {
        error = passwordErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}

function validateConfirmPassword() {
    let password = passwordInput.value;
    let confirmPassword = confirmPasswordInput.value;
    if (password !== confirmPassword) {
        error = confirmPasswordErrorMsg;
    } else {
        error = defaultMsg;
    }
    return error;
}

// Event handler for form submission
function validate() {
    let valid = true;

    // Validate name
    let nameValidation = validateName();
    if (nameValidation !== defaultMsg) {
        nameError.textContent = nameValidation;
        valid = false;
    } else {
        nameError.textContent = defaultMsg;
    }

    // Validate email
    let emailValidation = validateEmail();
    if (emailValidation !== defaultMsg) {
        emailError.textContent = emailValidation;
        valid = false;
    } else {
        emailError.textContent = defaultMsg;
    }

    // Validate password
    let passwordValidation = validatePassword();
    if (passwordValidation !== defaultMsg) {
        passwordError.textContent = passwordValidation;
        valid = false;
    } else {
        passwordError.textContent = defaultMsg;
    }

    // Validate confirm password
    let confirmPasswordValidation = validateConfirmPassword();
    if (confirmPasswordValidation !== defaultMsg) {
        confirmPasswordError.textContent = confirmPasswordValidation;
        valid = false;
    } else {
        confirmPasswordError.textContent = defaultMsg;
    }

    return valid;
}

// Add event listeners to clear error messages when inputs are corrected
nameInput.addEventListener("blur", () => {
    let x = validateName();
    if (x == defaultMsg) {
        nameError.textContent = defaultMsg;
    }
});

emailInput.addEventListener("blur", () => {
    let x = validateEmail();
    if (x == defaultMsg) {
        emailError.textContent = defaultMsg;
    }
});

passwordInput.addEventListener("blur", () => {
    let x = validatePassword();
    if (x == defaultMsg) {
        passwordError.textContent = defaultMsg;
    }
});

confirmPasswordInput.addEventListener("blur", () => {
    let x = validateConfirmPassword();
    if (x == defaultMsg) {
        confirmPasswordError.textContent = defaultMsg;
    }
});

// Select the form element
let form = document.querySelector("#register-form");

// Attach the validate function to the form's submit event
form.addEventListener("submit", function(event) {
    if (!validate()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
