const form = document.getElementById("signupForm");
const fullNameInput = document.getElementById("full-name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const phoneNumberInput = document.getElementById("phone-number");

const fullNameError = document.getElementById("fullNameError");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");
const phoneNumberError = document.getElementById("phoneNumberError");

const validateFullName = () => {
  if (fullNameInput.value.trim() === "") {
    fullNameError.textContent = "Full name is required";
  } else {
    fullNameError.textContent = "";
  }
};

const validateEmail = () => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput.value.trim())) {
    emailError.textContent = "Invalid email format";
  } else {
    emailError.textContent = "";
  }
};

const validatePassword = () => {
  const passwordRegex = /^[A-Za-z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\-]+$/;
  if (!passwordRegex.test(passwordInput.value.trim())) {
    passwordError.textContent =
      "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
  } else {
    passwordError.textContent = "";
  }
};

const validatePhoneNumber = () => {
  if (phoneNumberInput.value.trim() === "") {
    phoneNumberError.textContent = "Phone number is required";
  } else {
    phoneNumberError.textContent = "";
  }
};

fullNameInput.addEventListener("input", validateFullName);
emailInput.addEventListener("input", validateEmail);
passwordInput.addEventListener("input", validatePassword);
phoneNumberInput.addEventListener("input", validatePhoneNumber);
