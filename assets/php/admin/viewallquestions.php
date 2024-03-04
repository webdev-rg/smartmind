<?php
include "/xampp/htdocs/smartmind/assets/php/connection.php";

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
