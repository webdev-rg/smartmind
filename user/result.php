<?php

include "../assets/php/connection.php";
session_start();

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $quizResult = mysqli_query($connection, "SELECT * FROM `attempted_quiz` WHERE `studentId` = $studentId");
  if ($quizResult && mysqli_num_rows($quizResult) > 0) {
    $row = mysqli_fetch_assoc($quizResult);
  } 
  else {
    echo "ERROR" . mysqli_error($connection);
  }
} 
else {
  header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Result</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- CSS File -->
  <link rel="stylesheet" href="../assets/css/result.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon" />
</head>

<body>
  <div class="container">
    <div class="greeting-image">
      <?php
      if ($row["result"] == "Pass") {
      ?>
        <img src="../assets/images/congratulations.svg" alt="greeting-image">
      <?php
      } else if ($row["result"] == "Fail") {
      ?>
        <img src="../assets/images/fail.png" alt="greeting-image">
      <?php
      }
      ?>
    </div>
    <div class="student-name">
      <h2><?php echo $row["student_name"]; ?></h2>
    </div>
    <div class="quiz-details">
      <p>You have pass <?php echo $row["quiz_topic_name"] ?> Quiz</p>
      <p>Your Score: <?php echo $row["score"]; ?></p>
    </div>
    <div class="back-to-home">
      <a href="./profile.php">Back to home</a>
    </div>
  </div>
</body>

</html>