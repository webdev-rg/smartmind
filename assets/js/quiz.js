import { warningMessage } from "./functions.js";

const nextButtons = document.querySelectorAll(".nextButton");
const quizContents = document.querySelectorAll(".quiz-content-wrapper");
const optionsContainers = document.querySelectorAll(".options-container");
const submitQuiz = document.getElementById("submitQuiz");

const validateQuiz = (index) => {
  const options = optionsContainers[index].querySelectorAll(".option");

  let checked = false;
  options.forEach((option) => {
    if (option.checked) {
      checked = true;
    }
  });

  if (!checked) {
    // alert("Please select an answer before moving to the next question.");
    warningMessage("Please select any one option");
  } 
  else {
    if (index === quizContents.length - 1) {
      submitQuiz.setAttribute("type", "submit");
      document.querySelector("form").submit();
    } else {
      // Move to the next question
      quizContents[index].classList.remove("active");
      quizContents[index + 1].classList.add("active");
    }
  }
};

nextButtons.forEach((button, index) => {
  button.addEventListener("click", () => validateQuiz(index));
});
