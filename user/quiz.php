<?php 
include "../assets/php/playquiz.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz -
    <?php echo $row["topic_name"] ?>
  </title>

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
    <div class="preloader">
      <div class="spinner"></div>
    </div> 

  <div class="main-container">
    <div class="container">
      <div class="progress-container">
        <div class="progress">
          <div class="progress-bar">
            <div class="bar"></div>
          </div>
        </div>
        <div class="exit-quiz">
          <span id="exit-quiz"><i class="fi fi-rr-cross-small"></i></span>
        </div>
      </div>
      <form action="#" method="post" class="quiz-form" id="quizForm">
        <div class="quiz-container">
          <div class="top">
            <div class="title">
              <h2>
                <?php echo $questions[0]["topic_name"] ?>
              </h2>
            </div>
            <div class="timer">
              <h2 id="timer"></h2>
            </div>
          </div>
          <!-- First Question -->
          <div class="quiz-content-wrapper active">
            <h1 id="questionNo">Question 1</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[0]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[0]["option1"] ?>">
                    <input type="radio" name="option1" class="option" id="<?php echo $questions[0]["option1"] ?>" value="<?php echo $questions[0]["option1"] ?>" hidden>
                    <?php echo $questions[0]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[0]["option2"] ?>">
                    <input type="radio" name="option1" class="option" id="<?php echo $questions[0]["option2"] ?>" value="<?php echo $questions[0]["option2"] ?>" hidden>
                    <?php echo $questions[0]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[0]["option3"] ?>">
                    <input type="radio" name="option1" class="option" id="<?php echo $questions[0]["option3"] ?>" value="<?php echo $questions[0]["option3"] ?>" hidden>
                    <?php echo $questions[0]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[0]["option4"] ?>">
                    <input type="radio" name="option1" class="option" id="<?php echo $questions[0]["option4"] ?>" value="<?php echo $questions[0]["option4"] ?>" hidden>
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
              <p>
                <?php echo $questions[1]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[1]["option1"] ?>">
                    <input type="radio" name="option2" class="option" id="<?php echo $questions[1]["option1"] ?>" value="<?php echo $questions[1]["option1"] ?>" hidden>
                    <?php echo $questions[1]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[1]["option2"] ?>">
                    <input type="radio" name="option2" class="option" id="<?php echo $questions[1]["option2"] ?>" value="<?php echo $questions[1]["option2"] ?>" hidden>
                    <?php echo $questions[1]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[1]["option3"] ?>">
                    <input type="radio" name="option2" class="option" id="<?php echo $questions[1]["option3"] ?>" value="<?php echo $questions[1]["option3"] ?>" hidden>
                    <?php echo $questions[1]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[1]["option4"] ?>">
                    <input type="radio" name="option2" class="option" id="<?php echo $questions[1]["option4"] ?>" value="<?php echo $questions[1]["option4"] ?>" hidden>
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
          <!-- Third Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 3</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[2]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[2]["option1"] ?>">
                    <input type="radio" name="option3" class="option" id="<?php echo $questions[2]["option1"] ?>" value="<?php echo $questions[2]["option1"] ?>" hidden>
                    <?php echo $questions[2]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[2]["option2"] ?>">
                    <input type="radio" name="option3" class="option" id="<?php echo $questions[2]["option2"] ?>" value="<?php echo $questions[2]["option2"] ?>" hidden>
                    <?php echo $questions[2]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[2]["option3"] ?>">
                    <input type="radio" name="option3" class="option" id="<?php echo $questions[2]["option3"] ?>" value="<?php echo $questions[2]["option3"] ?>" hidden>
                    <?php echo $questions[2]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[2]["option4"] ?>">
                    <input type="radio" name="option3" class="option" id="<?php echo $questions[2]["option4"] ?>" value="<?php echo $questions[2]["option4"] ?>" hidden>
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
          <!-- Forth Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 4</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[3]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[3]["option1"] ?>">
                    <input type="radio" name="option4" class="option" id="<?php echo $questions[3]["option1"] ?>" value="<?php echo $questions[3]["option1"] ?>" hidden>
                    <?php echo $questions[3]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[3]["option2"] ?>">
                    <input type="radio" name="option4" class="option" id="<?php echo $questions[3]["option2"] ?>" value="<?php echo $questions[3]["option2"] ?>" hidden>
                    <?php echo $questions[3]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[3]["option3"] ?>">
                    <input type="radio" name="option4" class="option" id="<?php echo $questions[3]["option3"] ?>" value="<?php echo $questions[3]["option3"] ?>" hidden>
                    <?php echo $questions[3]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[3]["option4"] ?>">
                    <input type="radio" name="option4" class="option" id="<?php echo $questions[3]["option4"] ?>" value="<?php echo $questions[3]["option4"] ?>" hidden>
                    <?php echo $questions[3]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Fifth Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 5</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[4]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[4]["option1"] ?>">
                    <input type="radio" name="option5" class="option" id="<?php echo $questions[4]["option1"] ?>" value="<?php echo $questions[4]["option1"] ?>" hidden>
                    <?php echo $questions[4]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[4]["option2"] ?>">
                    <input type="radio" name="option5" class="option" id="<?php echo $questions[4]["option2"] ?>" value="<?php echo $questions[4]["option2"] ?>" hidden>
                    <?php echo $questions[4]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[4]["option3"] ?>">
                    <input type="radio" name="option5" class="option" id="<?php echo $questions[4]["option3"] ?>" value="<?php echo $questions[4]["option3"] ?>" hidden>
                    <?php echo $questions[4]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[4]["option4"] ?>">
                    <input type="radio" name="option5" class="option" id="<?php echo $questions[4]["option4"] ?>" value="<?php echo $questions[4]["option4"] ?>" hidden>
                    <?php echo $questions[4]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Sixth Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 6</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[5]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[5]["option1"] ?>">
                    <input type="radio" name="option6" class="option" id="<?php echo $questions[5]["option1"] ?>" value="<?php echo $questions[5]["option1"] ?>" hidden>
                    <?php echo $questions[5]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[5]["option2"] ?>">
                    <input type="radio" name="option6" class="option" id="<?php echo $questions[5]["option2"] ?>" value="<?php echo $questions[5]["option2"] ?>" hidden>
                    <?php echo $questions[5]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[5]["option3"] ?>">
                    <input type="radio" name="option6" class="option" id="<?php echo $questions[5]["option3"] ?>" value="<?php echo $questions[5]["option3"] ?>" hidden>
                    <?php echo $questions[5]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[5]["option4"] ?>">
                    <input type="radio" name="option6" class="option" id="<?php echo $questions[5]["option4"] ?>" value="<?php echo $questions[5]["option4"] ?>" hidden>
                    <?php echo $questions[5]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Seventh Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 7</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[6]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[6]["option1"] ?>">
                    <input type="radio" name="option7" class="option" id="<?php echo $questions[6]["option1"] ?>" value="<?php echo $questions[6]["option1"] ?>" hidden>
                    <?php echo $questions[6]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[6]["option2"] ?>">
                    <input type="radio" name="option7" class="option" id="<?php echo $questions[6]["option2"] ?>" value="<?php echo $questions[6]["option2"] ?>" hidden>
                    <?php echo $questions[6]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[6]["option3"] ?>">
                    <input type="radio" name="option7" class="option" id="<?php echo $questions[6]["option3"] ?>" value="<?php echo $questions[6]["option3"] ?>" hidden>
                    <?php echo $questions[6]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[6]["option4"] ?>">
                    <input type="radio" name="option7" class="option" id="<?php echo $questions[6]["option4"] ?>" value="<?php echo $questions[6]["option4"] ?>" hidden>
                    <?php echo $questions[6]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Eight Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 8</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[7]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[7]["option1"] ?>">
                    <input type="radio" name="option8" class="option" id="<?php echo $questions[7]["option1"] ?>" value="<?php echo $questions[7]["option1"] ?>" hidden>
                    <?php echo $questions[7]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[7]["option2"] ?>">
                    <input type="radio" name="option8" class="option" id="<?php echo $questions[7]["option2"] ?>" value="<?php echo $questions[7]["option2"] ?>" hidden>
                    <?php echo $questions[7]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[7]["option3"] ?>">
                    <input type="radio" name="option8" class="option" id="<?php echo $questions[7]["option3"] ?>" value="<?php echo $questions[7]["option3"] ?>" hidden>
                    <?php echo $questions[7]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[7]["option4"] ?>">
                    <input type="radio" name="option8" class="option" id="<?php echo $questions[7]["option4"] ?>" value="<?php echo $questions[7]["option4"] ?>" hidden>
                    <?php echo $questions[7]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Ninth Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 9</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[8]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[8]["option1"] ?>">
                    <input type="radio" name="option9" class="option" id="<?php echo $questions[8]["option1"] ?>" value="<?php echo $questions[8]["option1"] ?>" hidden>
                    <?php echo $questions[8]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[8]["option2"] ?>">
                    <input type="radio" name="option9" class="option" id="<?php echo $questions[8]["option2"] ?>" value="<?php echo $questions[8]["option2"] ?>" hidden>
                    <?php echo $questions[8]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[8]["option3"] ?>">
                    <input type="radio" name="option9" class="option" id="<?php echo $questions[8]["option3"] ?>" value="<?php echo $questions[8]["option3"] ?>" hidden>
                    <?php echo $questions[8]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[8]["option4"] ?>">
                    <input type="radio" name="option9" class="option" id="<?php echo $questions[8]["option4"] ?>" value="<?php echo $questions[8]["option4"] ?>" hidden>
                    <?php echo $questions[8]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <!-- Tenth Question -->
          <div class="quiz-content-wrapper">
            <h1 id="questionNo">Question 10</h1>
            <div class="question-container">
              <p>
                <?php echo $questions[9]["question"] ?>
              </p>
            </div>

            <div class="options-container">
              <div class="option-group">
                <div class="option-field">
                  <span>A</span>
                  <label for="<?php echo $questions[9]["option1"] ?>">
                    <input type="radio" name="option10" class="option" id="<?php echo $questions[9]["option1"] ?>" value="<?php echo $questions[9]["option1"] ?>" hidden>
                    <?php echo $questions[9]["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>B</span>
                  <label for="<?php echo $questions[9]["option2"] ?>">
                    <input type="radio" name="option10" class="option" id="<?php echo $questions[9]["option2"] ?>" value="<?php echo $questions[9]["option2"] ?>" hidden>
                    <?php echo $questions[9]["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                  <span>C</span>
                  <label for="<?php echo $questions[9]["option3"] ?>">
                    <input type="radio" name="option10" class="option" id="<?php echo $questions[9]["option3"] ?>" value="<?php echo $questions[9]["option3"] ?>" hidden>
                    <?php echo $questions[9]["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                  <span>D</span>
                  <label for="<?php echo $questions[9]["option4"] ?>">
                    <input type="radio" name="option10" class="option" id="<?php echo $questions[9]["option4"] ?>" value="<?php echo $questions[9]["option4"] ?>" hidden>
                    <?php echo $questions[9]["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="finishQuiz" class="nextButton" id="submitQuiz" value="Finish Quiz">
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="module" src="../assets/js/functions.js"></script>
  <script type="module" src="../assets/js/quiz.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>