<?php

include "./assets/php/connection.php";
session_start();

if(!empty($_SESSION["studentId"])) {
  $selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';
  $query = mysqli_query($connection, "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'");
  
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
  }
}
else {
  header("Location: login.php");
}

$connection->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz - <?php echo $row["topic_name"] ?></title>

  <!-- Css -->
  <link rel="stylesheet" href="./assets/css/quiz.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon" />

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <div class="main-container">
    <div class="container">
      <form action="#" method="post" class="quiz-form">
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
                  <label for="option1">
                    <input type="radio" name="option" id="option1" value="Option1" hidden>
                    <?php echo $row["option1"] ?>
                  </label>
                </div>
                <div class="option-field">
                <span>B</span>
                  <label for="option2">
                    <input type="radio" name="option" id="option2" value="Option2" hidden>
                    <?php echo $row["option2"] ?>
                  </label>
                </div>
              </div>
              <div class="option-group">
                <div class="option-field">
                <span>C</span>
                  <label for="option3">
                    <input type="radio" name="option" id="option3" value="Option1" hidden>
                    <?php echo $row["option3"] ?>
                  </label>
                </div>
                <div class="option-field">
                <span>D</span>
                  <label for="option4">
                    <input type="radio" name="option" id="option4" value="Option1" hidden>
                    <?php echo $row["option4"] ?>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="submit-btn">
            <input type="submit" name="nextQuestion" value="Next">
          </div>
        </div>
      </form>

    </div>
  </div>
</body>

</html>