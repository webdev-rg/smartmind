<?php
include "../assets/php/admin/adminDetails.php";
include "../assets/php/connection.php";

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["adminId"])) {
  // Fetch topic details
  $fetchTopic = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $topicResult = mysqli_query($connection, $fetchTopic);

  if ($topicResult && mysqli_num_rows($topicResult) > 0) {
    $topicRow = mysqli_fetch_assoc($topicResult);
  } 

  // Fetch quiz questions
  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchQuestions);
} else {
  header("Location: ./adminlogin.php");
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $topicRow["topic_name"]; ?></title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/viewquestions.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <!-- Preloader 
  <div class="preloader">
    <div class="spinner"></div>
  </div> -->

  <header class="header">
    <h2><?php echo $topicRow["topic_name"]; ?></h2>
    <div class="admin">
      <div class="admin-info-wrapper">
        <div class="admin-image">
          <img src="../assets/images/profile-user.png" alt="admin-profile-image">
        </div>
        <div class="admin-info">
          <h2><?php echo $fetchData["adminFirstName"] . ' ' . $fetchData["adminLastName"]; ?></h2>
          <p><?php echo $fetchData["adminEmail"] ?></p>
        </div>
        <i class="fi fi-rr-angle-small-down"></i>
      </div>
      <ul class="admin-menu">
        <li class="active"><a href="./profile.php">Profile</a></li>
        <li><a href="./setting.php">Setting</a></li>
        <li><a href="./adminlogout.php">Logout</a></li>
      </ul>
    </div>
  </header>

  <div class="container">
    <div class="questions-container">
      <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="question-card">
            <div class="menu">
              <i class="fi fi-rr-menu-dots-vertical"></i>
            </div>
            <div class="question-info-wrapper">
              <div class="question-item">
                <span class="question-item-label">Q)</span>
                <textarea name="question" class="question-item-value"><?php echo $row["question"] ?></textarea>
              </div>

              <div class="options-item">
                <div class="option-group">
                  <div class="option-field">
                    <!-- <span>A</span> -->
                    <input type="text" name="option" id="<?php echo $row["option1"] ?>" value="<?php echo $row["option1"] ?>">
                  </div>
                  <div class="option-field">
                    <!-- <span>B</span> -->
                    <input type="text" name="option" id="<?php echo $row["option2"] ?>" value="<?php echo $row["option2"] ?>">
                  </div>
                </div>
                <div class="option-group">
                  <div class="option-field">
                    <!-- <span>C</span> -->
                    <input type="text" name="option" id="<?php echo $row["option3"] ?>" value="<?php echo $row["option3"] ?>">
                  </div>
                  <div class="option-field">
                    <!-- <span>D</span> -->
                    <input type="text" name="option" id="<?php echo $row["option4"] ?>" value="<?php echo $row["option4"] ?>">
                  </div>
                </div>
                <div class="option-group">
                  <div class="option-field">
                    <input type="text" name="option" id="<?php echo $row["answer"] ?>" value="<?php echo $row["answer"] ?>">
                  </div>
                  <div class="option-field">
                    <input type="text" name="option" id="<?php echo $row["marks"] ?>" value="<?php echo $row["marks"] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } else {
        echo "No questions for this quiz";
      } ?>

    </div>
  </div>

  <!-- JavaScript -->
  <script src="../assets/js/script.js"></script>
</body>

</html>