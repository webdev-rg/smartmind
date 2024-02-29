<?php
include "../assets/php/connection.php";
session_start();

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $fetchTopicName = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchTopicName);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    // Handle the error or redirect to a different page
    header("Location: ../index.php");
    exit;
  }

  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $questionResult = mysqli_query($connection, $fetchQuestions);

  if ($questionResult && mysqli_num_rows($questionResult) > 0) {
    $questions = mysqli_fetch_all($questionResult, MYSQLI_ASSOC);
  } 
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['finishQuiz'])) {
    // Process and store the quiz results
    $score = 0;

    // Fetch all answers for the selected topic
    $fetchAnswers = mysqli_query($connection, "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'");
    if ($fetchAnswers && mysqli_num_rows($fetchAnswers) > 0) {
      $answersData = mysqli_fetch_all($fetchAnswers, MYSQLI_ASSOC);

      $option1 = $_POST["option1"];
      $option2 = $_POST["option2"];
      $option3 = $_POST["option3"];
      $option4 = $_POST["option4"];
      $option5 = $_POST["option5"];
      $option6 = $_POST["option6"];
      $option7 = $_POST["option7"];
      $option8 = $_POST["option8"];
      $option9 = $_POST["option9"];
      $option10 = $_POST["option10"];

      if ($option1 == $answersData[0]["answer"]) {
        $score += 2;
      }
      if ($option2 == $answersData[1]["answer"]) {
        $score += 2;
      }
      if ($option3 == $answersData[2]["answer"]) {
        $score += 2;
      }
      if ($option4 == $answersData[3]["answer"]) {
        $score += 2;
      }
      if ($option5 == $answersData[4]["answer"]) {
        $score += 2;
      }
      if ($option6 == $answersData[5]["answer"]) {
        $score += 2;
      }
      if ($option7 == $answersData[6]["answer"]) {
        $score += 2;
      }
      if ($option8 == $answersData[7]["answer"]) {
        $score += 2;
      }
      if ($option9 == $answersData[8]["answer"]) {
        $score += 2;
      }
      if ($option10 == $answersData[9]["answer"]) {
        $score += 2;
      }
    }

    // Getting student's name
    $studentData = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");
    $fetchStudentData = mysqli_fetch_assoc($studentData);
    $studentName = $fetchStudentData["firstName"] . ' ' . $fetchStudentData["lastName"];
    $topicName = $row["topic_name"];

    $level; 
    $result;

    if($socre < 4) {
      $level = "Fail";
      $result = "Fail";
    }
    if($score > 4 && $score <= 10) {
      $level = "Basic Level";
      $result = "Pass";
    }
    if($score >= 10 && $score <= 16) {
      $level = "Intermediate Level";
      $result = "Pass";
    }
    if($score >= 16 && $score <= 20) {
      $level = "Advance Level";
      $result = "Pass";
    }

    // Store the quiz results in the database
    $insertAttemptedQuiz = "INSERT INTO `attempted_quiz` (`studentId`, `student_name`, `topic_unique_id`, `quiz_topic_name`, `level`, `score`, `result`) 
    VALUES ('$studentId', '$studentName', '$selectedTopic', '$topicName', '$level', '$score', '$result')";
    $insertResult = mysqli_query($connection, $insertAttemptedQuiz);

    if ($insertResult) {
      // Redirect to a success page or do any other post-submission actions
      header("Location: quiz_success.php");
      exit;
    } else {
      // Handle the error
      echo "Error: " . mysqli_error($connection);
    }
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

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="module" src="../assets/js/quiz.js"></script>
  <script type="module" src="../assets/js/functions.js"></script>
  <!-- <script src="../assets/js/script.js"></script> -->

</head>

<body>
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="spinner"></div>
  </div> -->

  <div class="main-container">
    <div class="container">
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

</body>

</html>
