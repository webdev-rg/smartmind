import { warningMessage } from "./functions.js";

const preloader = document.querySelector(".preloader");

window.addEventListener("load", () => {
  setTimeout(() => {
    preloader.classList.add("hide-loader");
  }, 1000);
});

const nextButtons = document.querySelectorAll(".nextButton");
const quizContents = document.querySelectorAll(".quiz-content-wrapper");
const optionsContainers = document.querySelectorAll(".options-container");
const submitQuiz = document.getElementById("submitQuiz");

let seconds = 30;
let timerInterval;

function startTimer() {
  timerInterval = setInterval(countdown, 1000);
}

function stopTimer() {
  clearInterval(timerInterval);
  console.log("Timer Stopped");
}

function resetTimer() {
  seconds = 30;
  updateTimer();
}

const options = document.querySelectorAll(
  ".quiz-content-wrapper.active .options-container .option"
);

function countdown() {
  if (seconds === 0) {
    warningMessage("Timer's up!");
    setTimeout(() => {
      window.location.replace("/smartmind/user/profile.php");
    }, 1000);

    if(validateOptions(options)) {
      stopTimer(); // Stop the timer when it reaches 0
    }
    return;
  }

  seconds--;
  updateTimer();
}


function disableOtherOptions(currentOption) {
  optionsContainers.forEach((container) => {
    const options = container.querySelectorAll(
      ".quiz-content-wrapper.active .option"
    );
    options.forEach((option) => {
      if (option !== currentOption) {
        option.setAttribute("disabled", true);
      }
    });
  });
}

function validateOptions(options) {
  let checked = false;

  options.forEach((option) => {
    if (option.checked) {
      console.log(option.value);
      checked = true;
      disableOtherOptions(option);
    }
  });

  return checked;
}

function validateQuiz(index) {
  const options = optionsContainers[index].querySelectorAll(".option");

  if (!validateOptions(options)) {
    warningMessage("Please select any one option");
  } 
  else {
    if (index === quizContents.length - 1) {
      submitQuiz.setAttribute("type", "submit");
      document.querySelector("form").submit();
    } else {
      resetTimer();
      startTimer();
      quizContents[index].classList.remove("active");
      quizContents[index + 1].classList.add("active");
    }
  }
}

nextButtons.forEach((button, index) => {
  button.addEventListener("click", () => validateQuiz(index));
});

function updateTimer() {
  const timerDisplay = document.getElementById("timer");
  timerDisplay.textContent = `00 : ${seconds < 10 ? "0" : ""}${seconds}`;
}

// Initial call to display the timer
updateTimer();

// Start the timer initially
startTimer();
