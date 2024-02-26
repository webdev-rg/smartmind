<?php
include "../assets/php/connection.php";
session_start();

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["studentId"])) {
  $fetchTopicName = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchTopicName);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }

  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $questionResult = mysqli_query($connection, $fetchQuestions);

  if ($questionResult && mysqli_num_rows($questionResult) > 0) {
    $questions = mysqli_fetch_all($questionResult, MYSQLI_ASSOC);
  }
} else {
  header("Location: ../login.php");
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz - <?php echo $row["topic_name"] ?></title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/quiz.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon" />

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <!-- Preloader 
  <div class="preloader">
    <div class="spinner"></div>
  </div> -->

  <div class="main-container">
    <div class="container">
      <form action="#" method="post" class="quiz-form">
        <div class="quiz-container">
          <div class="top">
            <div class="title">
              <h2><?php echo $questions[0]["topic_name"] ?></h2>
            </div>
            <div class="timer">
              <h2>30 : 00</h2>
            </div>
          </div>
          <!-- First Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 1</h1>
            <div class="question-container">
              <p><?php echo $questions[0]["question"] ?></p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[0]["option1"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[0]["option1"] ?>" value="<?php echo $questions[0]["option1"] ?>" hidden>
                    <?php echo $questions[0]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[0]["option2"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[0]["option2"] ?>" value="<?php echo $questions[0]["option2"] ?>" hidden>
                    <?php echo $questions[0]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[0]["option3"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[0]["option3"] ?>" value="<?php echo $questions[0]["option3"] ?>" hidden>
                    <?php echo $questions[0]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[0]["option4"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[0]["option4"] ?>" value="<?php echo $questions[0]["option4"] ?>" hidden>
                    <?php echo $questions[0]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Second Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 2</h1>
            <div class="question-container">
              <p><?php echo $questions[1]["question"] ?></p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[1]["option1"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[1]["option1"] ?>" value="<?php echo $questions[1]["option1"] ?>" hidden>
                    <?php echo $questions[1]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[1]["option2"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[1]["option2"] ?>" value="<?php echo $questions[1]["option2"] ?>" hidden>
                    <?php echo $questions[1]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[1]["option3"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[1]["option3"] ?>" value="<?php echo $questions[1]["option3"] ?>" hidden>
                    <?php echo $questions[1]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[1]["option4"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[1]["option4"] ?>" value="<?php echo $questions[1]["option4"] ?>" hidden>
                    <?php echo $questions[1]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Thrd Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 3</h1>
            <div class="question-container">
              <p><?php echo $questions[2]["question"] ?></p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[2]["option1"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[2]["option1"] ?>" value="<?php echo $questions[2]["option1"] ?>" hidden>
                    <?php echo $questions[2]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[2]["option2"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[2]["option2"] ?>" value="<?php echo $questions[2]["option2"] ?>" hidden>
                    <?php echo $questions[2]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[2]["option3"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[2]["option3"] ?>" value="<?php echo $questions[2]["option3"] ?>" hidden>
                    <?php echo $questions[2]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[2]["option4"] ?>">
                    <input type="radio" name="option" id="<?php echo $questions[2]["option4"] ?>" value="<?php echo $questions[2]["option4"] ?>" hidden>
                    <?php echo $questions[2]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- <script src="../assets/js/script.js"></script> -->

  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      const quizForm = document.querySelector('.quiz-form');
      let questionNo = document.getElementById("questionNo");
      const quizContainers = document.querySelectorAll('.quiz-container');
      let currentQuestionIndex = 0;

      function showQuestion(index) {
        quizContainers.forEach((container, i) => {
          if (i === index) {
            container.classList.add('active');
          } else {
            container.classList.remove('active');
          }
        });
      }

      function nextQuestion() {
        currentQuestionIndex++;

        if (currentQuestionIndex < quizContainers.length) {
          showQuestion(currentQuestionIndex);
        } else {
          // Handle quiz completion or redirection here
          alert('Quiz completed!');
          // You may redirect the user or perform any other actions
        }
      }

      showQuestion(currentQuestionIndex); // Show the first question by default

      const nextButton = document.querySelector('.nextButton');
      nextButton.addEventListener('click', nextQuestion);
    });
  </script> -->




</body>
</html>
