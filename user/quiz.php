<?php
include "../assets/php/connection.php";
session_start();

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["studentId"])) {
  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchQuestions);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
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
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="spinner"></div>
  </div> -->

  <div class="main-container">
    <div class="container">
      <form action="#" method="post" class="quiz-form">
        <?php if (mysqli_num_rows($result) > 0) { ?>
          <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <div class="quiz-container">
            <div class="top">
              <div class="title">
                <h2><?php echo $row["topic_name"] ?></h2>
              </div>
              <div class="timer">
                <h2>30 : 00</h2>
              </div>
            </div>
            <div class="quiz-content-wrapper">
              <h1>Question 1</h1>
              <div class="question-container">
                <p><?php echo $row["question"] ?></p>
              </div>

              <div class="options-container">
                <div class="option-group">
                  <div class="option-field">
                    <span>A</span>
                    <label for="<?php echo $row["option1"] ?>">
                      <input type="radio" name="option" id="<?php echo $row["option1"] ?>" value="<?php echo $row["option1"] ?>" hidden>
                      <?php echo $row["option1"] ?>
                    </label>
                  </div>
                  <div class="option-field">
                    <span>B</span>
                    <label for="<?php echo $row["option2"] ?>">
                      <input type="radio" name="option" id="<?php echo $row["option2"] ?>" value="<?php echo $row["option2"] ?>" hidden>
                      <?php echo $row["option2"] ?>
                    </label>
                  </div>
                </div>
                <div class="option-group">
                  <div class="option-field">
                    <span>C</span>
                    <label for="<?php echo $row["option3"] ?>">
                      <input type="radio" name="option" id="<?php echo $row["option3"] ?>" value="<?php echo $row["option3"] ?>" hidden>
                      <?php echo $row["option3"] ?>
                    </label>
                  </div>
                  <div class="option-field">
                    <span>D</span>
                    <label for="<?php echo $row["option4"] ?>">
                      <input type="radio" name="option" id="<?php echo $row["option4"] ?>" value="<?php echo $row["option4"] ?>" hidden>
                      <?php echo $row["option4"] ?>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="submit-btn">
              <input type="button" name="nextQuestion" class="nextButton" value="Next">
            </div>
          </div>
          <?php } ?>
        <?php
        } else {
        ?>
          <h1>No Questions in this quiz</h1>
        <?php } ?>
      </form>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
</body>

</html>