// import { warningMessage } from "./functions.js";

// let timer;
// let seconds = 60;

// // 30 Seconds Timer
// function startTimer() {
//   clearInterval(timer);
//   timer = setInterval(function () {
//     document.getElementById("timer").innerText = `00 : ${
//       seconds < 10 ? "0" : ""
//     }${seconds}`;
//     seconds--;

//     if (seconds < 0) {
//       clearInterval(timer);
//       warningMessage("Time's up");
//       setTimeout(() => {
//         window.location.replace("/smartmind/user/profile.php");
//       }, 2000);
//     }
//     validateOptions();
//   }, 1000);
// }

// startTimer();

// // Reset timer
// const resetTimer = () => {
//   clearInterval(timer);
//   seconds = 60;
//   startTimer();
// };

// // Check option is selected or not

// const optionFields = document.querySelectorAll(
//   ".quiz-content-wrapper.active .option-field"
// );
// const options = document.querySelectorAll(
//   ".quiz-content-wrapper.active .option-field .option"
// );

// const validateOptions = () => {
//   let isChecked = false;

//   options.forEach((option, index) => {
//     if (option.checked) {
//       isChecked = true;
//       // clearInterval(timer);
//       optionFields[index].classList.add("active");
//     } else {
//       optionFields[index].classList.remove("active");
//     }
//   });

//   return isChecked;
// };

// // Show next question

// const nextButtons = document.querySelectorAll(".nextButton");
// const quizContents = document.querySelectorAll(".quiz-content-wrapper");
// const submitQuiz = document.getElementById("submitQuiz");

// const nextQuestion = (index) => {
//   let checkedOption = validateOptions();

//   if (!checkedOption) {
//     warningMessage("Select one option");
//   } else {
//     resetTimer();

//     if (index === quizContents.length - 1) {
//       submitQuiz.setAttribute("type", "submit");
//       document.querySelector("form").submit();
//     } else {
//       quizContents[index].classList.remove("active");
//       quizContents[index + 1].classList.add("active");
//     }
//   }
// };

// nextButtons.forEach((button, index) => {
//   button.addEventListener("click", () => nextQuestion(index));
// });

import { warningMessage } from "./functions.js";

let timer;
let seconds = 30;

// 30 Seconds Timer
function startTimer() {
  // clearInterval(timer);
  timer = setInterval(function () {
    document.getElementById("timer").innerText = `00 : ${
      seconds < 10 ? "0" : ""
    }${seconds}`;
    seconds--;

    if (seconds < 0) {
      clearInterval(timer);
      warningMessage("Time's up");
      setTimeout(() => {
        window.location.replace("/smartmind/user/profile.php");
      }, 2000);
    }
    validateOptions();
  }, 1000);
}

startTimer();

// Reset timer
const resetTimer = () => {
  clearInterval(timer);
  seconds = 30;
  startTimer();
};

// Check option is selected or not
const validateOptions = () => {
  let isChecked = false;

  const activeOptionFields = document.querySelectorAll(
    ".quiz-content-wrapper.active .option-field"
  );
  const activeOptions = document.querySelectorAll(
    ".quiz-content-wrapper.active .option-field .option"
  );

  activeOptions.forEach((option, index) => {
    if (option.checked) {
      isChecked = true;
      console.log(option.value);
      clearInterval(timer);
      activeOptionFields[index].classList.add("active");
    } else {
      activeOptionFields[index].classList.remove("active");
    }
  });

  return isChecked;
};

// Show next question
const nextButtons = document.querySelectorAll(".nextButton");
const quizContents = document.querySelectorAll(".quiz-content-wrapper");
const submitQuiz = document.getElementById("submitQuiz");
const progressBar = document.querySelector(".bar");
const exitQuiz = document.getElementById("exit-quiz");

const nextQuestion = (index) => {
  let checkedOption = validateOptions();

  if (!checkedOption) {
    warningMessage("Select one option");
  } else {
    resetTimer();

    if (index === quizContents.length - 1) {
      submitQuiz.setAttribute("type", "submit");
      document.querySelector("form").submit();
    } else {
      quizContents[index].classList.remove("active");
      quizContents[index + 1].classList.add("active");
      progressBar.style.width = `${(index + 1) * 10}%`;
    }
  }
};

nextButtons.forEach((button, index) => {
  button.addEventListener("click", () => nextQuestion(index));
});

exitQuiz.addEventListener("click", () => {
  clearInterval(timer);
  Swal.fire({
    title: "<h2 style='font-size: 1.8rem; font-weight: 600; line-height: 1.9;'>Are you sure?</h2>",
    text: "You want to exit the quiz?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#004eec",
    cancelButtonColor: "#ef4444",
    cancelButtonText: "<h2>No</h2>",
    confirmButtonText: "<h2>Yes</h2>",
    iconColor: "#004eec"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.replace("./profile.php");
    } else if(result.dismiss === Swal.DismissReason.cancel) {
      startTimer();
    }
  });
});
