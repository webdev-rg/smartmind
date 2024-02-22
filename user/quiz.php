<?php
include "../assets/php/connection.php";
session_start();

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["studentId"])) {
  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchQuestions);

  if ($result && mysqli_num_rows($result) > 0) {
    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
  <title>Quiz - <?php echo $questions[0]["topic_name"] ?></title>

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
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="spinner"></div>
  </div> -->

  <div class="main-container">
    <div class="container">
      <form action="#" method="post" class="quiz-form">
        <?php if (!empty($questions)) { ?>
          <?php $questionCount = count($questions); ?>
          <?php for ($questionIndex = 0; $questionIndex < $questionCount; $questionIndex++) { ?>
            <div class="quiz-container question-<?php echo $questionIndex + 1; ?>">
              <div class="top">
                <div class="title">
                  <h2><?php echo $questions[$questionIndex]["topic_name"] ?></h2>
                </div>
                <div class="timer">
                  <h2>30 : 00</h2>
                </div>
              </div>
              <div class="quiz-content-wrapper">
                <h1>Question <?php echo $questionIndex + 1; ?></h1>
                <div class="question-container">
                  <p><?php echo $questions[$questionIndex]["question"] ?></p>
                </div>

                <div class="options-container">
                  <div class="option-group">
                    <div class="option-field">
                      <span>A</span>
                      <label for="option<?php echo $questionIndex + 1; ?>_1">
                        <input type="radio" name="option<?php echo $questionIndex + 1; ?>" id="option<?php echo $questionIndex + 1; ?>_1" value="<?php echo $questions[$questionIndex]["option1"]; ?>" hidden>
                        <?php echo $questions[$questionIndex]["option1"]; ?>
                      </label>
                    </div>
                    <div class="option-field">
                      <span>B</span>
                      <label for="option<?php echo $questionIndex + 1; ?>_2">
                        <input type="radio" name="option<?php echo $questionIndex + 1; ?>" id="option<?php echo $questionIndex + 1; ?>_2" value="<?php echo $questions[$questionIndex]["option2"]; ?>" hidden>
                        <?php echo $questions[$questionIndex]["option2"]; ?>
                      </label>
                    </div>
                  </div>
                  <div class="option-group">
                    <div class="option-field">
                      <span>C</span>
                      <label for="option<?php echo $questionIndex + 1; ?>_3">
                        <input type="radio" name="option<?php echo $questionIndex + 1; ?>" id="option<?php echo $questionIndex + 1; ?>_3" value="<?php echo $questions[$questionIndex]["option3"]; ?>" hidden>
                        <?php echo $questions[$questionIndex]["option3"]; ?>
                      </label>
                    </div>
                    <div class="option-field">
                      <span>D</span>
                      <label for="option<?php echo $questionIndex + 1; ?>_4">
                        <input type="radio" name="option<?php echo $questionIndex + 1; ?>" id="option<?php echo $questionIndex + 1; ?>_4" value="<?php echo $questions[$questionIndex]["option4"]; ?>" hidden>
                        <?php echo $questions[$questionIndex]["option4"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <?php if ($questionIndex !== $questionCount - 1) { ?>
                <div class="submit-btn">
                  <input type="button" name="nextQuestion" class="nextButton" value="Next" data-question="<?php echo $questionIndex + 1; ?>">
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        <?php } else { ?>
          <h1>No Questions in this quiz</h1>
        <?php } ?>
      </form>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
  <script>
    const quizContents = document.querySelectorAll(".quiz-container");
    const nextButtons = document.querySelectorAll(".nextButton");

    quizContents[0].classList.add("active");

    let currentQuestion = 1;

    nextButtons.forEach(button => {
      button.addEventListener("click", () => {
        quizContents[currentQuestion - 1].classList.remove("active");
        currentQuestion++;
        if (currentQuestion <= quizContents.length) {
          quizContents[currentQuestion - 1].classList.add("active");
        }
      });
    });

    // Optionally, you can hide all questions initially and display the first one.
    quizContents.forEach((content, index) => {
      if (index !== 0) {
        content.classList.remove("active");
      }
    });
  </script>
</body>

</html>