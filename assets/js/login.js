import { successMessage, errorMessage, warningMessage } from "./functions.js";

const loginBtn = document.getElementById("loginBtn");
const email = document.getElementById("email");
const password = document.getElementById("password");

const loginFormValidation = (e) => {
  // e.preventDefault();
  if (email.value === "") {
    warningMessage("Enter your email");
    email.focus();
  } 
  else if (password.value === "") {
    warningMessage("Enter your password");
    password.focus();
  } 
  else {
    // successMessage("Login Successful");
    loginBtn.setAttribute("type", "submit");
    setTimeout(() => {
      document.querySelector("form").submit();
      location.replace("/SmartMind/user/profile.php");
    }, 2000);
  }
};

loginBtn.addEventListener("click", loginFormValidation);
