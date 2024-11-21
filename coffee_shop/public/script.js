// Select input elements for email and password
let emailInput = document.querySelector("#email");
let passwordInput = document.querySelector("#password");

// Create paragraph to display the email validation error
let emailError = document.createElement('p');
emailError.setAttribute("class", "warning");
document.querySelectorAll(".form-group")[0].append(emailError); // Append to email parent

// Create paragraph to display the password validation error
let passwordError = document.createElement('p');
passwordError.setAttribute("class", "warning");
document.querySelectorAll(".form-group")[1].append(passwordError); // Append to password parent

// Define global error messages
let defaultMsg = "";
let emailErrorMsg = "Please enter a valid email address.";
let passwordErrorMsg = "Password must be at least 8 characters long.";

// Method to validate email
function validateEmail() {
    let email = emailInput.value; // Get email value
    let regexp = /\S+@\S+\.\S+/; // Regular expression for email format
    return regexp.test(email) ? defaultMsg : emailErrorMsg;
}

// Method to validate password
function validatePassword() {
    let password = passwordInput.value; // Get password value
    return password.length >= 8 ? defaultMsg : passwordErrorMsg;
}

// Event handler for submit event
function validateForm() {
    let valid = true; // Form validity flag

    // Validate email
    let emailValidation = validateEmail();
    if (emailValidation !== defaultMsg) {
        emailError.textContent = emailValidation;
        valid = false;
    }

    // Validate password
    let passwordValidation = validatePassword();
    if (passwordValidation !== defaultMsg) {
        passwordError.textContent = passwordValidation;
        valid = false;
    }

    return valid; // Return overall form validity
}

// Event listener to reset the error messages on form reset
function resetFormErrors() {
    emailError.textContent = defaultMsg;
    passwordError.textContent = defaultMsg;
}
document.querySelector("form").addEventListener("reset", resetFormErrors);

// Event listener for email input validation on blur
emailInput.addEventListener("blur", () => {
    let validationMessage = validateEmail();
    emailError.textContent = validationMessage === defaultMsg ? defaultMsg : validationMessage;
});

// Event listener for password input validation on blur
passwordInput.addEventListener("blur", () => {
    let validationMessage = validatePassword();
    passwordError.textContent = validationMessage === defaultMsg ? defaultMsg : validationMessage;
});
