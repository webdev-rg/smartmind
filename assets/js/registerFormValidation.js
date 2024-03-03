// Import the message functions
import { warningMessage, errorMessage, successMessage } from "./functions.js";

// All Inputs
const firstName = document.getElementById("firstName"),
  lastName = document.getElementById("lastName"),
  dateOfBirth = document.getElementById("dateOfBirth"),
  maleGender = document.getElementById("male"),
  femaleGender = document.getElementById("female"),
  email = document.getElementById("email"),
  mobileNumber = document.getElementById("mobileNumber"),
  password = document.getElementById("password"),
  confirmPassword = document.getElementById("confirmPassword"),
  submitButton = document.getElementById("finalSubmitBtn");

const steps = document.querySelectorAll(".step");
const pagination = document.querySelectorAll(".indicator");
const forms = document.querySelectorAll(".form");

export const nameFormValidation = () => {
  if (firstName.value === "") {
    warningMessage("Enter Your First Name");
    firstName.focus();
  } 
  else if (lastName.value === "") {
    warningMessage("Enter Your Last Name");
    lastName.focus();
  } 
  else {
    forms[0].classList.remove("active");
    forms[1].classList.add("active");
    pagination[1].classList.add("active");
    steps[0].classList.add("active");
  }
};

export const dateOfBirthAndGenderValidation = () => {
  if (dateOfBirth.value === "") {
    warningMessage("Enter Your Date of Birth");
    dateOfBirth.focus();
  } 
  else if (!maleGender.checked && !femaleGender.checked) {
    warningMessage("Select Your Gender");
  } 
  else {
    forms[1].classList.remove("active");
    forms[2].classList.add("active");
    pagination[2].classList.add("active");
    steps[1].classList.add("active");
  }
};

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

export const contactFormValidation = () => {
  if (email.value === "") {
    warningMessage("Enter Your Email");
    email.focus();
  } 
  else if (!email.value.match(emailRegex)) {
    errorMessage("Invalid Email");
  } 
  else if (mobileNumber.value === "") {
    warningMessage("Enter Your Mobile Number");
    mobileNumber.focus();
  } 
  else {
    forms[2].classList.remove("active");
    forms[3].classList.add("active");
    pagination[3].classList.add("active");
    steps[2].classList.add("active");
  }
};

const passwordRegex =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

export const finalValidation = (e) => {
  e.preventDefault();
  
  if (password.value === "") {
    warningMessage("Enter a Password");
    password.focus();
  }
  else if (password.value.length < 8) {
    errorMessage("Password must be atleast 8 characters");
    password.focus();
  }
  else if (!password.value.match(passwordRegex)) {
    warningMessage("Create a strong password");
    password.focus();
  }
  else if (confirmPassword.value === "") {
    warningMessage("Confirm Your Password");
    confirmPassword.focus();
  }
  else if (confirmPassword.value !== password.value) {
    errorMessage("Password does not match");
    confirmPassword.focus();
  }
  else {
    steps[3].classList.add("active");
    successMessage("Registration Successful");
    submitButton.setAttribute("type", "submit");
    document.querySelector("form").submit();
    setTimeout(() => {
      window.location.replace("/smartmind/registerSuccess.html");
    }, 2000);
  }
};
