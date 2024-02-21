<?php
include "../assets/php/connection.php";
session_start();
if(!empty($_SESSION['studentId'])) {
  $selectQuizes = mysqli_query($connection, "SELECT * FROM `quiz_topics`");
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
  <title>Choose Quiz</title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/quizes.css" />

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
  
  <header class="header">
    <div class="left-side">
      <div class="logo">
        <img src="../assets/images/Logo.svg" alt="logo" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="./profile.php">My Profile</a></li>
          <li class="active"><a href="./quizes">Quizes</a></li>
        </ul>
      </nav>
    </div>

    <div class="right-side">
      <div class="user">
        <span>My Account <i class="fi fi-rr-angle-small-down"></i></span>
        <ul class="user-menu">
          <li><a href="./profile.php">My Profile</a></li>
          <li class="active"><a href="./quizes.php">Quizes</a></li>
          <li><a href="./editprofile.php">Edit Profile</a></li>
          <li><a href="./setting.php">Setting</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <section class="quizes-section">
    <div class="container">
      <div class="heading">
        <h1>Quizes</h1>
        <p>Start a new quiz gain new knowledge, or reach higher levels in your existing skills.</p>
      </div>

      <div class="quiz-card-container">
        <?php
        if (mysqli_num_rows($selectQuizes) > 0) {
          while ($fetchQuizes = mysqli_fetch_assoc($selectQuizes)) {
        ?>
            <div class="quiz-card">
              <div class="quiz-lang-img">
                <div class="img">
                  <img src="../assets/images/Javascript.png" alt="quiz-lang-image">
                </div>
              </div>

              <div class="quiz-info-wrapper">
                <div class="quiz-info-item">
                  <h5><?php echo $fetchQuizes["topic_name"]; ?></h5>
                </div>
                <div class="quiz-info-item">
                  <span class="quiz-info-item-label">Questions: </span>
                  <span class="quiz-info-item-value"><?php echo $fetchQuizes["questions"]; ?></span>
                </div>
                <div class="quiz-info-item">
                  <span class="quiz-info-item-label">Marks: </span>
                  <span class="quiz-info-item-value"><?php echo $fetchQuizes["marks"]; ?></span>
                </div>
                <div class="quiz-info-item">
                  <span class="quiz-info-item-label">Time: </span>
                  <span class="quiz-info-item-value"><?php echo $fetchQuizes["quiz_time"]; ?></span>
                </div>
                <div class="quiz-info-item">
                  <a href="./quiz.php?topic=<?php echo $fetchQuizes["topicUniqueId"]; ?>">Start Quiz</a>
                </div>  
              </div>
            </div>
          <?php
          }
        } else {
          ?>
          <h2>No Quizes</h2>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
</body>

</html>