// import { warningMessage } from "./functions.js";

// const nextButtons = document.querySelectorAll(".nextButton");
// const quizContents = document.querySelectorAll(".quiz-content-wrapper");
// const optionsContainers = document.querySelectorAll(".options-container");
// const submitQuiz = document.getElementById("submitQuiz");

// let seconds = 15;

// const disableOtherOptions = (currentOption) => {
//   optionsContainers.forEach((container) => {
//     const options = container.querySelectorAll(
//       ".quiz-content-wrapper.active .option"
//     );
//     options.forEach((option) => {
//       if (option !== currentOption) {
//         option.disabled = true;
//       }
//     });
//   });
// };

// let timerInterval;

// function startTimer() {
//   timerInterval = setInterval(countdown, 1000);
// }

// function stopTimer() {
//   clearInterval(timerInterval);
// }

// function countdown() {
//   if (seconds === 0) {
//     warningMessage("Timer's up!");
//     setTimeout(() => {
//       window.location.replace("/smartmind/user/profile.php");
//     }, 1000);
//     return;
//   }

//   seconds--;
//   updateTimer();
// }

// const validateQuiz = (index) => {
//   const options = optionsContainers[index].querySelectorAll(".option");

//   let checked = false;
//   options.forEach((option) => {
//     if (option.checked) {
//       checked = true;
//       disableOtherOptions(option);
//       stopTimer();
//     }
//   });

//   if (!checked) {
//     warningMessage("Please select any one option");
//   } else {
//     if (index === quizContents.length - 1) {
//       submitQuiz.setAttribute("type", "submit");
//       document.querySelector("form").submit();
//     } else {
//       // Timer reset
//       resetTimer();

//       // Start timer again
//       startTimer();

//       // Move to the next question
//       quizContents[index].classList.remove("active");
//       quizContents[index + 1].classList.add("active");
//     }
//   }
// };

// nextButtons.forEach((button, index) => {
//   button.addEventListener("click", () => validateQuiz(index));
// });

// // Initial call to display the timer
// updateTimer();

// // Start the timer initially
// startTimer();

// function updateTimer() {
//   const timerDisplay = document.getElementById("timer");
//   timerDisplay.textContent = `00 : ${seconds < 10 ? "0" : ""}${seconds}`;
// }

// function countdown() {
//   if (seconds === 0) {
//     warningMessage("Timer's up!");
//     setTimeout(() => {
//       window.location.replace("/smartmind/user/profile.php");
//     }, 1000);
//     return;
//   }

//   seconds--;
//   updateTimer();
// }

// // Initial call to display the timer
// updateTimer();

// // Set up the timer to update every second
// setInterval(countdown, 1000);

import { warningMessage } from "./functions.js";

const nextButtons = document.querySelectorAll(".nextButton");
const quizContents = document.querySelectorAll(".quiz-content-wrapper");
const optionsContainers = document.querySelectorAll(".options-container");
const submitQuiz = document.getElementById("submitQuiz");

let seconds = 20;
let timerInterval;
let isTimerStopped = false; // New variable to track whether the timer is stopped

function startTimer() {
  timerInterval = setInterval(countdown, 1000);
}

function stopTimer() {
  clearInterval(timerInterval);
  console.log("Timer Stopped");
  isTimerStopped = true;
}

function resetTimer() {
  seconds = 20;
  updateTimer();
  isTimerStopped = false; // Reset the flag when resetting the timer
}

function countdown() {
  if (seconds === 0) {
    warningMessage("Timer's up!");
    setTimeout(() => {
      window.location.replace("/smartmind/user/profile.php");
    }, 1000);

    if (!isTimerStopped) {
      stopTimer(); // Ensure the timer stops only once
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
        option.disabled = true;
      }
    });
  });
}

function validateOptions(options) {
  let checked = false;
  options.forEach((option) => {
    if (option.checked) {
      checked = true;
      console.log(option.value);
      disableOtherOptions(option);
    }
  });

  if (checked && !isTimerStopped) {
    stopTimer();
  }

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
