// Import the validation functions
import { nameFormValidation, dateOfBirthAndGenderValidation, contactFormValidation, finalValidation } from './registerFormValidation.js';

const nextFormButtons = document.querySelectorAll(".next-form-btn");
const previousFormButtons = document.querySelectorAll(".previous-form-btn");
const steps = document.querySelectorAll(".step");
const pagination = document.querySelectorAll(".indicator");
const forms = document.querySelectorAll(".form");

nextFormButtons[0].addEventListener("click", nameFormValidation);

nextFormButtons[1].addEventListener("click", dateOfBirthAndGenderValidation);

nextFormButtons[2].addEventListener("click", contactFormValidation);

nextFormButtons[3].addEventListener("click", finalValidation);

previousFormButtons[2].addEventListener("click", () => {
  forms[3].classList.remove("active");
  forms[2].classList.add("active");
  steps[3].classList.remove("active");
  pagination[3].classList.remove("active");
});

previousFormButtons[1].addEventListener("click", () => {
  forms[2].classList.remove("active");
  forms[1].classList.add("active");
  steps[2].classList.remove("active");
  pagination[2].classList.remove("active");
});

previousFormButtons[0].addEventListener("click", () => {
  forms[1].classList.remove("active");
  forms[0].classList.add("active");
  steps[1].classList.remove("active");
  pagination[1].classList.remove("active");
});
