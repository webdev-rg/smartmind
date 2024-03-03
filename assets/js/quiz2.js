import { warningMessage } from "./functions.js";

const preloader = document.querySelector(".preloader");

window.addEventListener("load", () => {
  setTimeout(() => {
    preloader.classList.add("hide-loader");
  }, 1000);
});

let seconds = 30;
const timerElement = document.getElementById("timer");
const options = document.querySelectorAll(".quiz-content-wrapper.active .option");
const optionFields = document.querySelectorAll(".quiz-content-wrapper.active .option-field");

let timerInterval;

const nextButtons = document.querySelectorAll(".nextButton");
const quizContents = document.querySelectorAll(".quiz-content-wrapper");
const submitQuiz = document.getElementById("submitQuiz");

const validateOptions = () => {
  let isChecked = false;

  options.forEach((option, index) => {
    if (option.checked) {
      isChecked = true;
      clearInterval(timerInterval);
      optionFields[index].classList.add("active");
      return; // Exit the loop once a checked option is found
    }
  });

  return isChecked;
};

const startTimer = () => {
  timerInterval = setInterval(function () {
    if (seconds === 0) {
      clearInterval(timerInterval);
      warningMessage("Time's up!");
      setTimeout(() => {
        window.location.replace("/smartmind/user/profile.php");
      }, 1000);
    } 
    else {
      seconds--;
      timerElement.textContent = `00 : ${seconds < 10 ? "0" : ""}${seconds}`;
      validateOptions();
    }
  }, 1000);
};

startTimer();

function resetTimer() {
  seconds = 30;
  startTimer();
}

const nextQuiz = (index) => {
  resetTimer();
  const optionsValid = validateOptions();

  if (!optionsValid) {
    warningMessage("Please select any one option");
  }
  else {
    if (index === quizContents.length - 1) {
      submitQuiz.setAttribute("type", "submit");
      document.querySelector("form").submit();
    }
    else {
      resetTimer();
      startTimer();
      quizContents[index].classList.remove("active");
      quizContents[index + 1].classList.add("active");
    }
  }
};

nextButtons.forEach((button, index) => {
  button.addEventListener("click", () => nextQuiz(index));
});
